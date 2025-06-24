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
    <pagination
        v-if="pagination"
        :pagination="pagination"
        @paginate="getCampaigns"
    ></pagination>
</template>

<script>
import Pagination from "../Shared/Pagination.vue";

export default {
    components: {
        Pagination
    },
    name: "CampaignGridComponent",

    data() {
        return {
            campaigns: [],
            pagination: null,
        }
    },

    mounted() {
        this.getCampaigns();
    },

    methods: {
        getCampaigns(page = 1) {
            axios.get(`/api/getCampaigns?page=${page}`)
                .then(response => {
                    this.campaigns = response.data.data;
                    this.pagination = response.data;
                })
                .catch(error => {
                    console.error('Error loading campaigns:', error);
                });
        }
    },

    props: ['guest']
}
</script>

<style scoped>

</style>
