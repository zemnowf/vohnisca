<template>
    <div class="campaign-detail">
        <div class="campaign-hero">

            <div v-if="campaign.preview_image" class="campaign-hero-image">
                <img :src="campaign.preview_image" :alt="campaign.title" class="hero-img">
                <div class="hero-overlay"></div>
            </div>

            <div class="campaign-hero-content">
                <div class="container">

                    <div v-if="campaign.createdAtFormatted !== null" class="campaign-meta-badge">
                        <span class="meta-date">{{ campaign.createdAtFormatted}} {{ }}</span>
                    </div>

                    <h1 class="campaign-title">{{ campaign.title }}</h1>

                    <div v-if="campaign.short_description" class="campaign-excerpt">
                        {{ campaign.short_description }}
                    </div>

                    <div class="campaign-actions">
                        <a v-if="this.user == null" href="/login" class="campaign-btn primary">Start Campaign?</a>
                        <a v-else href="#" class="campaign-btn primary">Start Campaign</a>
                        <a href="/campaigns" class="campaign-btn outline">Back to Campaigns</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="campaign-main container">
            <article class="campaign-content">
                {{ campaign.description }}
            </article>

            <aside class="campaign-sidebar">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Campaign Details</h3>
                    <ul class="sidebar-meta">
                        <li>
                            <i class="fas"></i>
                            <span>Author: <a href="#"> {{ author.name }} </a></span>
                        </li>
                        <li>
                            <i class="fas fa-calendar-alt"></i>
                            <span>Created: {{ campaign.createdAtFormatted }}</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Last updated: {{ campaign.updatedAtFormatted }} </span>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-card">
                    <h3 class="sidebar-title">Share This Campaign</h3>
                    <div class="social-share">
                        <a href="#" class="social-link"><i class="fas fa-link"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</template>

<script>
export default {
    name: "CampaignElement",

    data() {
        return {
            campaign: [],
            author: [],
            title: '',
            short_description: '',
            description: '',
            preview_image: null,
            user_id: null,
            user: null,
        }
    },

    mounted() {
        this.getCampaign();
        this.fetchUser();
    },

    methods: {
        getCampaign(campaignId = this.campaignId) {
            console.log(campaignId);
            axios.get(`/api/getCampaign`, {
                params: {
                    id: campaignId,
                }
            })
                .then(response => {
                    this.campaign = response.data;
                    console.log(this.campaign);
                    this.author = response.data.author;
                })
                .catch(error => {
                    console.error('Error loading campaign:', error);
                });
        },
        async fetchUser() {
            try {
                const response = await axios.get('/getAuthedUser');
                this.user = response.data?.user;
            } catch (error) {
                console.error("Error while fetching user:", error);
            }
        },
    },

    props: ['campaignId']
}
</script>

<style scoped>

</style>
