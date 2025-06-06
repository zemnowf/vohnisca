<template>
    <nav v-if="pagination && pagination.links.length > 3" class="custom-pagination">
        <!-- mobile -->
        <div class="pagination-mobile">
            <ul class="pagination-list">
                <li v-if="pagination.current_page === 1" class="pagination-item disabled">
                    <span class="pagination-link">&lsaquo;</span>
                </li>
                <li v-else class="pagination-item">
                    <a class="pagination-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">&lsaquo;</a>
                </li>

                <li class="pagination-item active">
                    <span class="pagination-link">{{ pagination.current_page }} / {{ pagination.last_page }}</span>
                </li>

                <li v-if="pagination.current_page === pagination.last_page" class="pagination-item disabled">
                    <span class="pagination-link">&rsaquo;</span>
                </li>
                <li v-else class="pagination-item">
                    <a class="pagination-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">&rsaquo;</a>
                </li>
            </ul>
        </div>

        <!-- desktop -->
        <div class="pagination-desktop">
            <div class="pagination-info">
                <p class="pagination-stats">
                    Showing
                    <span class="pagination-highlight">{{ pagination.from }}</span>
                    to
                    <span class="pagination-highlight">{{ pagination.to }}</span>
                    of
                    <span class="pagination-highlight">{{ pagination.total }}</span>
                    results
                </p>
            </div>

            <div class="pagination-nav">
                <ul class="pagination-list">
                    <li v-if="pagination.current_page === 1" class="pagination-item disabled">
                        <span class="pagination-link">&lsaquo;</span>
                    </li>
                    <li v-else class="pagination-item">
                        <a class="pagination-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">&lsaquo;</a>
                    </li>

                    <li v-for="(link, index) in pagination.links.slice(1, -1)" :key="index">
                        <template v-if="link.label">
                            <span v-if="link.active" class="pagination-link active">{{ link.label }}</span>
                            <a v-else class="pagination-link" href="#" @click.prevent="changePage(parseInt(link.label))">
                                {{ link.label }}
                            </a>
                        </template>
                    </li>

                    <li v-if="pagination.current_page === pagination.last_page" class="pagination-item disabled">
                        <span class="pagination-link">&rsaquo;</span>
                    </li>
                    <li v-else class="pagination-item">
                        <a class="pagination-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">&rsaquo;</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        pagination: Object,
    },
    methods: {
        changePage(page) {
            if (isNaN(page)) return;
            this.$emit('paginate', page);
        }
    }
}
</script>

<style scoped>

</style>
