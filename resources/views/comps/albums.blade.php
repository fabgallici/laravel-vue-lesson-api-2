<script type="text/x-template" id="albums">
  <div class="albums">
    <h3>
      Search:
      <input type="text" v-model="search"/>
      <i class="fas fa-times" @click="clearSearch()"/>
    </h3>
    <h3 class="error" v-show="error">Attention! @{{ error }}</h3>
    <div class="container" v-show="!error">
      <album v-for='album in filteredAlbum'
        :album='album'
        @input="update"
      />
    </div>
  </div>
</script>
<script type="text/javascript">

  Vue.component('albums', {
    template: "#albums",
    data() {

      return {

        error: false,
        search: '',
        albums: []
      };
    },
    created() {

        axios.get('https://flynn.boolean.careers/exercises/api/array/music')
              .then(res => {

                  console.log('res', res);

                  const data = res.data;

                  if (data.success !== true) {

                    console.log('error downloading albums');

                    this.error = "Data success is not true";

                    return;
                  }

                  this.albums = data.response;
                  console.log("albums", albums);
              })
              .catch(err => {

                this.error = "Error downloading data albums";
                console.log('err', err)
              });
    },
    computed: {

      searchLc() { return this.search.toLowerCase(); },
      filteredAlbum() {

        console.log("new search: " + this.search);

        // var res = [];
        // for (var i=0;i<this.albums.length;i++) {
        //
        //   var album = this.albums[i];
        //   if (album.title.toLowerCase().includes(this.search.toLowerCase())) {
        //     res.push(album);
        //   }
        // }
        //
        // return res;

        return this.albums.filter(
          album =>
            album.title.toLowerCase().includes(this.searchLc)
            || album.author.toLowerCase().includes(this.searchLc)
            || album.genre.toLowerCase().includes(this.searchLc)
            || album.year.toLowerCase().includes(this.searchLc)
        );
      }
    },
    methods: {

      clearSearch() {

        this.search = '';
      },

      update(search) {
        this.search = search;
      }

    }
  });

</script>