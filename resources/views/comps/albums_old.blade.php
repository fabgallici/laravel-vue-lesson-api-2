<script type="text/x-template" id="albums">
  <div class="album">
    <h1>Vue Comp center</h1>
    <h3>Albums</h3>
    <h3>
      <input type="text" v-model="search">
      <i class="fas fa-times" @click="clearSearch()"/>
    </h3>
    <h3 class="error" v-show="error">Attention! @{{error}}</h3>
    <p class="error-msg" v-text="errormsg"></p>
    <div class="container" v-show="!error">
      
      <div class="album-box" v-for='album in filteredAlbum'>
        <img class="poster" :src='album.poster' @click='openImageTo(album.poster)'>
        <div class="data">
          <p class="title">@{{ album.title }}</p>
          <p class="title">@{{ album.author }}</p>
          <p class="title">@{{ album.genre }}</p>
          <p class="title">@{{ album.year }}</p>
          <p class="title">@{{ album.poster }}</p>
        </div>

      </div>
    </div>
  </div>
</script>

<script type="text/javascript">

  Vue.component('albums', {
    template: "#albums",
    data() {
      return {
        albums: [],
        errormsg: '',
        error: false,
        search: ''
      };
    },
    created() {

      // const _this = this;

      axios.get('https://flynn.boolean.careers/exercises/api/array/music')
            .then(res => {    //usando function normale cambia this
              console.log('res', res);

              const data = res.data;

              if (data.success !==true) {
                console.log('error downloading albums');
                this.errormsg = 'error downloading albums';
                this.error = "data success is not true";
                return;
              }

              // const albums = data.response;
              this.albums = data.response;
              console.log("albums", albums);
            })
            .catch(err => {
              this.error = "error downloadgin data albums";
              this.errormsg = 'error downloading albums';
              console.log('err', err);
            });
            // .catch(function(err { _this.album = [] ;}));
    },
    computed: {
      searchLc() { return this.search.toLowerCase();},
      filteredAlbum() {

        // var res = [];
        // for (var i = 0; i<this.albums.length; i++) {
        //   var album = this.albums[i];
        //   if (album.title.toLowerCase().includes(this.search.toLowerCase())) {
        //     res.push(album);
        //   }
        // }
        // return res;

        return this.albums.filter(
          album => 
            // album.title.toLowerCase().includes(this.search.toLowerCase())
            // ||  album.author.toLowerCase().includes(this.search.toLowerCase())
            album.title.toLowerCase().includes(this.searchLc)
            ||  album.author.toLowerCase().includes(this.searchLc)
        );
      }
    },
    methods: {
      clearSearch() {
        this.search = '';
      },
      searchFor(search) {

      },
      openImageTo(url) {
        console.log("url", url);
        window.location.href = url;
      },
      clearSearch() {
        this.search = '';
      }
    }
  });

</script>