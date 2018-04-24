<template>

<div data-id="1" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="badge">
        <div class="badge_img">
            <img :src="'../img/'+ slideImg + ''">
        </div>
        <div v-bind:id="slide.id" class="badge_text">
            <div class="badge_text_title">{{slideTitle}}</div>
            <div class="badge_text_1">{{slideText}}</div>
            <div class="col-sm-12">
                <button type="button" :value="slide.On" :aria-pressed="isPressed" autocomplete="off" @click.prevent="changeToogle" class="btn btn-sm btn-toggle" v-bind:class="{ active: isActive }">
                    <div class="handle"></div>
                </button>
                <input type="text" :value="slide.newName" @input="changeName"/>
            </div>
            <p>{{slide.On}}</p>
        </div>
    </div>
    <p>{{ slide.newName }}</p>

</div>

</template>

<script>
    export default{
        props:['slideID','slideTitle','slideText','slideImg'],
        data(){
            return {
                slide: {
                    id:'',
                    title:'',
                    text:'',
                    newName: '',
                    On: false,
                    
                },
                isActive: true,
                isPressed:'true'
            }
        },
        methods: {
            changeToogle(){
                // slide.On='off';
                this.slide.On = !this.slide.On;
                this.isActive = !this.isActive;
                if(this.isPressed === 'false'){
                    this.isPressed = 'true';
                }
                else{
                    this.isPressed = 'false';
                }
                
            },
            changeName(){
                
                // this.$eventHub.$emit('change-name', this.newName);
                this.$eventHub.$emit('input', event.target.value);
            }
    },

    mounted() {

        // this.getNotifications();

        // console.log('Notifications component ready.')
        }
    }
</script>
