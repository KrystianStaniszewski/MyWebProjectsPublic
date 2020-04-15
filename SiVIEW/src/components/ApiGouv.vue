<template>
    <div id="form">
        <div class="sugdel" @click="modal = false;"></div>

            <label for="inp" class="inp">

                <input id="inp" type="text" name="doge" list="browsers" v-model="pays" placeholder=" " class="field-input" @focus="reset_var()">

                <span class="label">Pays</span>
                <span class="border"></span>

            </label>

        <datalist id="browsers">

            <div v-if="continents">

                <div v-for="(continent, index) in continents" :key="index">

                    <div v-for="(cont, index) in continent" :key="`A-${index}`">

                        <div v-if="cont.translations.fr === 'France'">
                            <option>{{ cont.translations.fr }}</option>
                        </div>

                    </div>

                    <option>-----------------------</option>

                    <div v-for="(cont, index) in continent" :key="`B-${index}`">

                        <div v-if="cont.translations.fr != 'France'">
                            <option>{{ cont.translations.fr }}</option>
                        </div>

                    </div>

                </div>

            </div>

        </datalist>

        <div v-if="pays === 'France'" class="relative z-10">

            <button class="btn first" v-on:click="(select_form = 'siret/siren') && reset_var()">siret/siren</button>
            <button class="btn first" v-on:click="(select_form = 'adresse') && reset_var()">adresse</button>

            <div v-if="select_form === 'adresse'">

                    <label for="inp" class="inp">

                        <input type="text" id="inp" placeholder=" " autocomplete="off" v-model="adresse1" @focus="modal = true; resetVC()">
                        <span class="label">Adresse</span>
                        <span class="border"></span>

                    </label>

                    <div v-if="adresse1 && modal">
                            <ul class="suges" v-for="(feature, x) in filteredStates.features" :key="`A-${x}`">
                                <li @click="setState(feature.properties.name, feature.properties.city, feature.properties.postcode, feature.geometry.coordinates[0], feature.geometry.coordinates[1])">
                                    {{feature.properties.label}}
                                </li>
                            </ul>
                    </div>

                    <label for="inp" class="inp">

                        <input id="inp" type="text" v-model="adresse2" placeholder=" " @click="modal = false;"/>
                        <span class="label">Adresse 2</span>
                        <span class="border"></span>

                    </label>

                    <label for="inp" class="inp">

                        <input id="inp" type="text" v-model="adresse3" placeholder=" " @click="modal = false;"/>
                        <span class="label">Adresse 3</span>
                        <span class="border"></span>

                    </label>

                    <label for="inp" class="inp">

                        <input id="inp" type="text" v-model="postcode" placeholder=" " @click="modal = false;"/>
                        <span class="label">Code Postal</span>
                        <span class="border"></span>
                        
                    </label>

                    <label for="inp" class="inp">

                        <input id="inp" type="text" v-model="ville" placeholder=" " @click="modal = false;"/>
                        <span class="label">Ville</span>
                        <span class="border"></span>
                        
                    </label>

                <button class="btn first" @click="initMap()">valider</button>
            </div>

            <div v-if="select_form === 'siret/siren'">

                <label for="inp" class="inp">

                    <input type="text" autocomplete="off" v-model="siret" placeholder=" " @focus="resetSiren()"/>
                    <span class="label">Siret</span>
                    <span class="border"></span>

                </label>

                <label for="inp" class="inp">

                    <input type="text" autocomplete="off" v-model="siren" placeholder=" " @focus="resetSiret()"/>
                    <span class="label">Siren</span>
                    <span class="border"></span>

                </label>

                <button class="btn first" @click="initMap()">valider</button>
            </div>
            
            <div id="mymap"></div>
        </div>

        <div v-if="pays != 'France'">

            <div v-for="(continent, index) in continents" :key="index">

                <div v-for="(cont, index) in continent" :key="`B-${index}`">

                    <div v-if="pays === cont.translations.fr">

                        <label for="inp" class="inp">

                            <input type="text" id="inp" v-model="adresse1" placeholder=" " autocomplete="off" @focus="resetVC()">
                            <span class="label">Adresse</span>
                            <span class="border"></span>

                        </label>

                        <label for="inp" class="inp">

                            <input id="inp" type="text" v-model="adresse2" placeholder=" "/>
                            <span class="label">Adresse 2</span>
                            <span class="border"></span>

                        </label>

                        <label for="inp" class="inp">

                            <input id="inp" type="text" v-model="adresse3" placeholder=" "/>
                            <span class="label">Adresse 3</span>
                            <span class="border"></span>

                        </label>

                        <label for="inp" class="inp">

                            <input id="inp" type="text" v-model="postcode" placeholder=" "/>
                            <span class="label">postecode</span>
                            <span class="border"></span>
                            
                        </label>

                        <label for="inp" class="inp">

                            <input id="inp" type="text" v-model="ville" placeholder=" "/>
                            <span class="label">ville</span>
                            <span class="border"></span>
                            
                        </label>

                        <button class="btn first">valider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import axios from 'axios';
    import L from 'leaflet';

    export default {
        data() {

            return {
            api_adresse: "https://api-adresse.data.gouv.fr/search/",
            api_country: "https://restcountries.eu/rest/v2/region/",
            api_entreprise: "https://entreprise.data.gouv.fr/api/sirene/v3/",
            option_siret: "etablissements/",
            option_siren: "unites_legales/",    
            option_adresse: "?q=",
            option_limit: "&limit=10",
            option_ville: "&type=street",
            option_postcode: '&postcode=',
            siret: '',
            siren: '',
            pays: '',
            adresse1: '',
            adresse2: '',
            adresse3: '',
            ville: '',
            postcode: '',
            lat: '',
            lon: '',
            http: '',
            select_form: '',
            searching: false,
            modal: false,

            states: [],
            filteredStates: [],

            continents:[],
            Ncontinents:[
                'europe',
                'asia',
                'africa',
                'americas',
                'oceania'
            ],
            xcontinent: 0,
            }
        },

        created() {

            if (this.xcontinent == 0) {
                while (this.xcontinent < this.Ncontinents.length) {
                    axios.get(this.api_country + this.Ncontinents[this.xcontinent])
                    .then(response => {
                        this.continents.push(response.data);
                    })
                    this.xcontinent = this.xcontinent + 1;
                }
            }
        },

        updated() {

            if(this.adresse1){
                this.http = this.api_adresse + this.option_adresse + this.adresse1

                if(this.ville) {
                    this.http = this.http + "+" + this.ville + this.option_ville
                }
                if (this.postcode) {
                    this.http = this.http + this.option_postcode + this.postcode
                }
                axios.get(this.http)
                .then(response => {
                    this.filterStates(response.data);
                })
            }

            if(this.siret && !this.siren) {
                this.http = this.api_entreprise + this.option_siret + this.siret
                axios.get(this.http)
                .then(response => {
                    this.filterStates(response.data);
                })
            }

            if(this.siren && !this.siret) {
                this.http = this.api_entreprise + this.option_siren + this.siren
                axios.get(this.http)
                .then(response => {
                    this.filterStates(response.data);
                })
            }
        },

        methods: {

            reset_var() {
                this.siret = '';
                this.siren = '';
                this.adresse1 = '';
                this.adresse2 = '';
                this.adresse3 = '';
                this.ville = '';
                this.postcode = '';
                this.lat = '';
                this.lon = '';
                this.http = '';

                if ((isNaN(document.getElementById('map')))) {
                        document.getElementById('mymap').removeChild(document.getElementById('map'))
                }
            },

            filterStates(states) {
                this.filteredStates = states;
            },

            setState(adresse1, ville, postcode, lon, lat) {
                this.adresse1 = adresse1;
                this.ville = ville;
                this.postcode = postcode;
                this.modal = false; 
                this.lat = lat;
                this.lon = lon;
            },

            initMap() {
                document.getElementById('mymap').innerHTML = "<div id='map'></div>";
                let mymap = L.map('map').setView([this.lat, this.lon], 18);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(mymap);
                L.marker([this.lat, this.lon]).addTo(mymap)
                .bindPopup(this.adresse1)
                .openPopup();
            },

            resetVC() {
                this.ville = '';
                this.postcode = '';
                this.siret = '';
                this.siren = '';
                if ((isNaN(document.getElementById('map')))) {
                    document.getElementById('mymap').removeChild(document.getElementById('map'))
                }
            },
            resetSiret() {
                this.siret = '';
            },
            resetSiren() {
                this.siren = '';
            },
        },

    }

</script>

<style>

@import"../css/fichier.css";

</style>