<template>
    <div class="row">
        <template v-if="loaded">
            <div   class="form__group md-col-6" :class="errors.province_id ? 'has__danger' : ''" @click.prevent="errors.province_id = null, errors.area_id = null" >
                <label for="province" class="form__label font--bold">Province</label>
                <div class="form__wrap">
                    <select @change.prevent="filteredData" id="province" class="form__item font--bold" v-model="listing.province_id" placeholder="Select Your Province">
                        <optgroup v-for="country in areas" :label="country.name">
                            <option :value="province.id" v-for="province in country.children">{{ province.name }}</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form__helper" v-if="errors.province_id">
                    {{ errors.province_id[0]}}
                </div>
            </div>

            <div v-if="provinces" class="form__group md-col-6" :class="errors.area_id ? 'has__danger' : ''">
                <template v-for="provs in provinces">
                    <label for="city" class="form__label font--bold">City</label>
                    <div class="form__wrap">
                        <select id="city" class="form__item font--bold" v-model="listing.area_id"  @focus.prevent="errors.area_id = null" >
                            <option v-for="city in provs.children" :value="city.id">{{ city.name }}</option>
                        </select>
                    </div>
                    <div class="form__helper" v-if="errors.area_id">
                        {{ errors.area_id[0]}}
                    </div>
                </template>
            </div>
            <div v-else class="form__group md-col-6" :class="errors.area_id ? 'has__danger' : ''">
                <label class="form__label font--bold">City</label>
                <div class="form__wrap">
                    <select disabled class="form__item font--bold" >
                        <option v-if="listing.area_id" value="">{{ listing.area.name }}</option>
                        <option v-else value="">Select City, Town</option>
                    </select>
                </div>
                <div class="form__helper" v-if="errors.area_id">
                    {{ errors.area_id[0]}}
                </div>
            </div>
        </template>
        <div v-else class="flex justify--center flex--align-center">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>

        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: "AreaDropdown",
        props: {
            listingObject: {
                required: false,
                type: Object
            }
        },
        data() {
            return {
                provinces: null
            }
        },
        computed: {
            ...mapGetters({
                areas: 'area/get_areas',
                listing: 'listings/get_listing',
                errors: 'getValidationErrors',
                loaded: 'area/loading_status'
            })
        },
        methods: {
            ...mapActions({
                setArea: 'area/set_areas',
            }),
            filteredData() {
                this.listing.area_id = ''
                this.provinces = this.areas[0].children.filter((area) => {
                    return Object.keys(area).some((key) => {
                        return parseInt(area[key]) === this.listing.province_id
                    })
                })
            }
        },
        created() {
            this.setArea()
        }
    }
</script>
