<template>
  <div id="appWrapper">
    <div class="">
        <div class="container">
            <div class="search-box">
                <input 
                    class="search-input" 
                    type="text" 
                    name="q" 
                    v-model="query"
                    placeholder="Escribe una palabra..."
                    @input="search" />
                <ul 
                    class="result-list"
                    :class="resultsVisibility">
                    <li v-bind:key="x" v-for="x in listaPost" class="result-item">
                        <a href="#" class="result-link">
                            <div class="result-title">{{ x.tile }}</div>
                            <div class="result-content">{{ x.content.substr(1, 40) }}</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic placeat ea ullam ab voluptatum sunt asperiores, doloribus omnis esse maiores dolorum magni reprehenderit! Atque ullam ab maiores suscipit officiis nemo.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa at molestiae sit animi adipisci vero, illum hic, nobis vitae doloremque enim obcaecati nesciunt fugiat esse commodi, accusantium neque dolores? Sit!</p>
        </div>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return{
            query:"",
            listaPost:[]
        }
    },
    computed:{
        resultsVisibility(){
            return (this.query.length > 0) ? 'show':'hide';
        }
    },
    methods:{
        search(){
            if(this.query.length > 1){
                axios.post('/304-livesearch/public/posts/search',{
                    q: this.query
                }).then(response=>{
                    console.log(response);
                    this.listaPost = response.data.posts;
                }).catch(error => {
                    console.log(error.response);
                });
            }
        }
    }
}
</script>

<style>
    body{
        font-family: sans-serif;
        font-style: italic;
    }

    ::-webkit-scrollbar{
        width: 1rem;
    }
    
    ::-webkit-scrollbar-track{
        background: #f1f1f1;
    }
    
    ::-webkit-scrollbar-thumb{
        background: #888;
    }

    ::-webkit-scrollbar-thumb:hover{
        background: #555;
    }
    .search-box{
        font-style: italic;
        position: relative;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .search-input{
        width:35rem;
        height: 2rem;
        border-radius: 1rem;
        border: 0;
        background:#eeeeee;
        padding: 0.5rem 1rem;
        font-size: 18pt;
        outline: none;
    }
    .result-list.show{
        width:37rem;
        max-height: 12rem;
        overflow-y:auto;
        list-style: none;
        background: #fff;
        padding:0;
        top:3rem;
        border-radius: 1rem;
        box-shadow: 1px 2px 8px 0px #b5b5b5;
        margin: 7px 0px;
    }
    .result-list.hide{
        display:none;
    }
    .result-item{
        border-bottom: 1px solid #ececec;
    }
    .result-link{
        text-decoration:none;
        color: #333;
        display: block;
        padding: 0.5rem 1rem;
    }
    .result-link{
        background: #f9f9f9;
    }
    .result-title{
        font-size: 1rem;
        font-weight: 600;
    }
</style>