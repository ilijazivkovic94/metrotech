<template>
    <div id="broadcast" style="margin: 0px auto"></div>
</template>

<script>
    export default {
        name: "TwitchStream",
        props: {
            channel: String
        },
        mounted() {
            const options = {
                width: '100%',
                height: 500,
                channel: this.channel
            };
            var player = new Twitch.Player("broadcast", options);
            console.log(player);
            player.setVolume(0.5);
        }
    }
</script>

<style scoped>

</style>
