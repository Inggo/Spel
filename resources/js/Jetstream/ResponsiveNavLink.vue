<template>
    <div>
        <button :class="classes" class="w-full text-left" v-if="as == 'button'">
            <slot></slot>
        </button>

        <inertia-link :href="href" :class="classes" v-else>
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
    export default {
        props: ['active', 'href', 'as'],

        computed: {
            classes() {
                return this.active
                            ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 dark:text-indigo-50 bg-indigo-50 dark:bg-indigo-700 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-100 focus:bg-indigo-100 dark:focus:bg-indigo-800 focus:border-indigo-700 dark:focus:border-indigo-300 transition'
                            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 hover:border-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-900 focus:border-gray-300 dark:focus:border-gray-700 transition'
            }
        }
    }
</script>
