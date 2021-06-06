<template>
    <div>
        <div class="p-6 sm:px-20 dark:text-white bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
            <div>
                <app-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Welcome {{ auth.name }}!
            </div>
        </div>
    </div>
</template>

<script>
    import AppLogo from '@/Spel/ApplicationLogo'

    export default {
        components: {
            AppLogo,
        },

        props: {
            auth: Object
        }
    }
</script>
