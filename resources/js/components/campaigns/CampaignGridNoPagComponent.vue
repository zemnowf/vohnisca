<template>
    <div class="main-campaigns container">
        <div class="main-campaign-info" v-for="campaign in campaigns" :key="campaign.id">
            <div class="main-campaign-text">
                <h3>{{ campaign.title }}</h3>
                <img :src="campaign.preview_image" :alt="campaign.title">
                <p>{{ campaign.short_description }}</p>
                {{ campaign.description }}
            </div>
            <div class="campaign-info-actions">
                <div v-if="guest" class="campaign-link">
                    <a href="/login">Start campaign</a>
                </div>
                <div v-else class="campaign-link">
                    <a href="#">Start campaign</a>
                </div>
                <div class="campaign-link">
                    <a :href="'/campaigns/' + campaign.id">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from "../Shared/Pagination.vue";

export default {
    name: "CampaignGridNoPagComponent",

    data() {
        return {
            campaigns: [],
            perPage: null,
        }
    },

    mounted() {
        this.getCampaigns();
    },

    methods: {
        getCampaigns(perPage = this.elementsPerPage) {
            axios.get(`/getCampaigns`, {
                params: {
                    perPage: perPage,
                }
            })
                .then(response => {
                    this.campaigns = response.data.data;
                })
                .catch(error => {
                    console.error('Error loading campaigns:', error);
                });
        }
    },

    props: ['guest', 'elementsPerPage']
}
</script>

<style scoped>

</style>
