<template>
    <div class="campaign-create-container">
        <div class="campaign-create-card">
            <div class="campaign-create-header">
                <h2>Create New Campaign</h2>
                <p>Fill out the form below to launch your new campaign</p>
            </div>

            <form @submit.prevent="submitForm" class="campaign-create-form">
                <div class="form-group">
                    <label for="title">Campaign Title</label>
                    <input
                        id="title"
                        type="text"
                        class="form-input"
                        v-model="form.title"
                        placeholder="Enter campaign title"
                        required
                        autofocus
                    />
                    <span v-if="errors.title" class="form-error" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ errors.title[0] }}
          </span>
                </div>

                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <textarea
                        id="short_description"
                        class="form-input"
                        v-model="form.short_description"
                        rows="3"
                        placeholder="Brief summary of your campaign"
                    ></textarea>
                    <span v-if="errors.short_description" class="form-error" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ errors.short_description[0] }}
          </span>
                </div>

                <div class="form-group">
                    <label for="description">Full Description</label>
                    <textarea
                        id="description"
                        class="form-input"
                        v-model="form.description"
                        rows="6"
                        placeholder="Detailed description of your campaign"
                    ></textarea>
                    <span v-if="errors.description" class="form-error" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ errors.description[0] }}
          </span>
                </div>

                <div class="form-group">
                    <label for="preview_image">Preview Image</label>
                    <div class="file-upload-wrapper">
                        <input
                            id="preview_image-input"
                            type="file"
                            class="file-upload-input"
                            @change="handleImageUpload"
                            accept="image/*"
                        />
                        <label for="preview_image" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            Choose an image file
                        </label>
                        <div class="file-upload-preview" v-if="imagePreview">
                            <img :src="imagePreview" alt="Preview" style="max-width: 200px; max-height: 200px;" />
                        </div>
                    </div>
                    <span v-if="errors.preview_image" class="form-error" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ errors.preview_image[0] }}
          </span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="campaign-submit-btn" :disabled="loading">
                        <span v-if="loading">Processing...</span>
                        <span v-else>Create Campaign</span>
                    </button>
                    <a :href="cancelUrl" class="campaign-cancel-btn">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        cancelUrl: {
            type: String,
            default: '/campaigns'
        }
    },
    data() {
        return {
            form: {
                title: '',
                short_description: '',
                description: '',
                preview_image: null,
                user_id: null
            },
            imagePreview: null,
            errors: {},
            loading: false
        }
    },
    mounted() {
        this.form.user_id = window.Laravel.user ? window.Laravel.user.id : null
    },
    methods: {
        handleImageUpload(event) {
            const file = event.target.files[0]
            if (file) {
                this.form.preview_image = file

                const reader = new FileReader()
                reader.onload = (e) => {
                    this.imagePreview = e.target.result
                }
                reader.readAsDataURL(file)
            }
        },
        async submitForm() {
            this.loading = true
            this.errors = {}

            try {
                const formData = new FormData()
                for (const key in this.form) {
                    if (this.form[key] !== null) {
                        formData.append(key, this.form[key])
                    }
                }

                const response = await axios.post('/api/createCampaign/', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })

                window.location.href = `/campaigns/${response.data.id}`
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors
                } else {
                    console.error('Error submitting form:', error)
                }
            } finally {
                this.loading = false
            }
        }
    }
}
</script>

<style scoped>

</style>
