<template>
    <div>
        <input type="text" name="slide" id="slide" v-model=item.slide>
        <h1>Update Item</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"></div>
        </div>
        {{ toggle }}
        <h4 class="title"><b>HOW TO</b></h4>
                        <b> Genera la combinazione delle slide:</b>
                        <p> 1 - DRAG & DROP per ordinare le slide</p>
                        <p> 2 - ON/OFF per disattivare le slide</p>
                        <p> 3 - genere il codice e segui le istruzioni per inserirlo nel sito</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offsett-12">
                                <button type="button" class="btn btn-block btn-success btn-make">genera codice</button>
                                <pre id="js"></pre>
                                <pre id="css"></pre>

                                <button type="button" class="btn btn-sm btn-danger" disabled="disabled">reset</button>
                                <!-- <button type="button" class="btn btn-sm btn-primary btn-copy" disabled="disabled">copia</button> -->
                                <!-- <br>
                                <br>
                                <a class="btn btn-sm btn-info" href="http://www.danielecolpo.it/newwp/" role="button">guarda un esempio</a> -->
                                
                            </div>
                        </div> 
        <form @submit.prevent="createPop()">
            <!-- {{ csrf_field() }} -->
            <!-- <input type="hidden" name="_token" :value="csrfToken"> -->
            <p>{{ toggle }}</p>
            <div class="form-group">
            <label for="title">Pops Title</label>
            <input type="text" class="form-control" id="popTitle"  name="title" placeholder="your title" v-model="item.title">
            </div>
            <div class="form-group">
            <label for="description">Pops url</label>
            <input type="text" class="form-control" id="popurl" name="url" v-model=item.url>
            </div>
            {{item.url}}
            <div class="form group">
                <textarea name="options" id="options" cols="30" rows="10" v-model=item.options></textarea>
                <!-- <input type="" id="options" name="options" v-model=item.options> -->
            </div>
            
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p>{{item.options}}</p>
            <div v-if="Id_error||errors" class="alert alert-danger">
                <ul>
                    <li v-if="Id_error">{{ Id_error }}</li>
                    <li v-if="errors" v-for="(value,key) in errors" v-bind:key="key">
                            <span v-for="(val) in value" v-bind:key="val"> {{val}}</span>
                    </li>
                </ul>
            </div>
            
            <div v-if="ok_message" class="alert alert-success">
                <p>{{ ok_message }}</p>
            </div>
    </div>
</template>

<script>

    export default{
        data() {
            return {
                list: [],
                errors: '',
                Id_error: '',
                ok_message:'',
                toggle: '',
                item: {
                    url: '',
                    title: '',
                    options: '[{"sd":1,"od":1,"ac":1,"ur":""},{"sd":2,"od":2,"ac":1,"ur":""},{"sd":3,"od":3,"ac":1,"ur":""},{"sd":4,"od":4,"ac":1,"ur":""},{"sd":5,"od":5,"ac":1,"ur":""},{"sd":6,"od":6,"ac":1,"ur":""}]',
                    slide: '',
                }
            };
        },
        
        created() {
            this.fetchPopList();
            // this.$eventHub.$on('change-name', this.changeName);
            this.$eventHub.$on('input', this.changeName);
            // app.$on('input', this.input.bind(this));
        },
        
        methods: {
            changeName(name) 
            {
            // name will be automatically transported to the parameter.
                this.item.slide = name;
            },
            fetchPopList() {
                axios.get('/pops').then((res) => {
                    this.list = res.data;
                });
            },
            // input(){
            //     this.item.slide='1';
            // },
 
            createPop() {
                axios.post('/pops', this.item)
                    .then((res) => {
                        this.item.title = '';
                        this.item.url = '';
                        // this.edit = false;
                        this.fetchPopList();
                        console.log(res.data);
                        this.errors='';
                        this.Id_error=res.data.Iderr;
                        this.ok_message=res.data.ok_message;
                        // this.toggle='prova';
                    })
                    .catch((err) => {
                        this.Id_error='';
                        console.error(err.response.data.errors);
                        this.errors= err.response.data.errors;
                    }); 
            },
 
            // deletePop(id) {
            //     axios.delete('pops/' + id)
            //         .then((res) => {
            //             this.fetchTaskList()
            //         })
            //         .catch((err) => console.error(err));
            // },
        }
    }
</script>