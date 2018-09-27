<template>
    <div class="box">
        <div class="box-header">
            <i class="fa fa-bar-chart-o fa-fw"></i> {{ title }}
        </div>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: "Example Card"
            },
        },
    }
</script>
