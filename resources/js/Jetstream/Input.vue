<template>
    <input class="border-gray-300 dark:bg-gray-50 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 focus:ring-opacity-50 rounded-md shadow-sm" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

