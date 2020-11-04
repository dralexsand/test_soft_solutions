<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li
                :class="{disabled: !pagination.prev_page_url}"
                @click.prevent="getPosts(pagination.prev_page_url)"
                class="page-item">
                <a
                    aria-label="Previous"
                    class="page-link"
                    href=""
                >
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li
                class="page-item disabled">
                <a class="page-link" href="">
                    Page is {{ pagination.current_page }} of {{ pagination.last_page }}
                </a>
            </li>

            <li
                :class="{disabled: !pagination.next_page_url}"
                @click.prevent="getPosts(pagination.next_page_url)"
                class="page-item">
                <a
                    aria-label="Next"
                    class="page-link"
                    href=""
                >
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>


        </ul>
    </nav>
</template>
<script>
export default {
    name: 'Pagination',
    props: {

    }
}
</script>
