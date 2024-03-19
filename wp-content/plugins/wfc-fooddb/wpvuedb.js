Vue.prototype.$scrollToTop = (x) => window.scrollTo(0,x)

new Vue({
  el: '#wpvuedb',
    data() {
      return {
        ascending: true,
        sortBy: "wfpgal",
        filterBy: "filter",
        searchValue: "",
        page:'cards',
        selectedcard:'',
        recipes:[],
      }
    },
    computed: {
      filteredRecipes() {
        let tempRecipes = this.recipes;

        // Process search input
        if (this.searchValue != "" && this.searchValue) {
          tempRecipes = tempRecipes.filter((item) => {
            return item.productdesc
              .toUpperCase()
              .includes(this.searchValue.toUpperCase());
          })
        }

        // Sort by alphabetical order
        tempRecipes = tempRecipes.sort((a, b) => {
          if (this.sortBy == "alphabetically") {
            let fa = a.productdesc.toLowerCase(),
            fb = b.productdesc.toLowerCase();

            if (fa < fb) {
              return -1;
            }
            if (fa > fb) {
              return 1;
            }
            return 0;

            // Sort by cooking time
          } else if (this.sortBy == "wfpgal") {
            return b.wfpgal - a.wfpgal;
          }
        })

        if (this.filterBy && this.filterBy != "filter")
          tempRecipes = tempRecipes.filter((item) => {
            return this.filterBy == item.category;
          })

        // Show sorted array in descending or ascending order
        if (!this.ascending) {
          tempRecipes.reverse();
        }
        return tempRecipes;
      }

    },

    methods: {
      resetbtn() {
        this.sortBy = "wfpgal"
        this.filterBy = ""
        this.searchValue = ""
        this.selectedcard=""
        this.page="cards"
        this.filterBy="filter"
      },
      wfootprint(val) {
        if (val > 75) {
          return ['L','Large']
        } else if (val < 21) {
          return ['S','Small']
        } else {
          return ['M','Medium']
        }
      },
      fetchjson() {
        var url = 'https://www.watercalculator.org/wp-content/plugins/wfc-fooddb/fooddb3.json'
        fetch(url).then((response) => {return response.json()}).then((data) => {this.recipes = data })
      }
    },

    created: function created() {
      this.fetchjson();
    },

  template: `

  <div id="wpvuedb" style="margin-bottom:100px">
    <div id="title-bar">
      <h1><em>The</em> <b>Water Footprint of Food</b> <em>Guide</em></h1>
      <p class="desc">How and where your food is produced, whether it's rainfed or irrigated, and how much pollution it creates, determines if the water footprint is small (<b>S</b>), medium (<b>M</b>) or large (<b>L</b>).</p>
    </div>
    <!-- {{filterBy}} -->
    <!-- Bar containing all sort inputs -->

    <div id="sort-bar">
      <!-- search -->
      <input class="filterbtn" type="text" v-model="searchValue" placeholder=" SEARCH: " id="search-input" @change="page='cards'">
      <select class="filterbtn srt" name="sortBy" id="select" v-model="sortBy">
        <option value="alphabetically">SORT ALPHABETICALLY</option>
        <option selected value="wfpgal">SORT BY FOOTPRINT</option>
      </select>
      <select class="filterbtn srt" name="filterBy" id="select" v-model="filterBy">
        <option disabled selected value="filter">CATEGORY</option>
        <option value="Vegetables">Vegetables</option>
        <option value="Fruit and Berries">Fruit & Berries</option>
        <option value="Nuts and Olives">Nuts & Olives</option>
        <option value="Grains and Flours">Grains & Flours</option>
        <option value="Peas, Beans and Lentils">Peas, Beans & Lentils</option>
        <option value="Meat and Eggs">Meat & Eggs</option>
        <option value="Prepared Foods">Prepared Foods</option>
        <option value="Beverages">Beverages</option>
      </select>
      <button id="btnResetHome" class="filterbtn srt resetbtn" @click="resetbtn()">RESET</button>
    </div>

    <!-- Where the array of recipes get rendered as cards -->
    <div v-if="page=='cards'" id="recipe-container">
      <div class="fd-card" v-for="recipe in filteredRecipes" :key="recipe.productdesc" @click="page='carddet';selectedcard=recipe;$scrollToTop(180)">
        <div class="recipeImg">

        <div class="db-wfootptint">{{wfootprint(recipe.wfpgal)[0]}}</div>
        <img :src="recipe.img" class="recipe-image">

        </div>
        <div class="fd-content">
          <h2 class="recipe-title">
            <span style="margin-right:7px">{{ recipe.productdesc }}</span>
          </h2>



          <p class="ozServing">(Serving size: {{ recipe.portionsize }})</p>
          <h3 class="gallonsPnd">{{ recipe.wfpgal }} gallons per serving</h3>
          <h3 class="litersKg">{{ Math.round(recipe.wfpgal * 3.7854) }} liters per serving</h3>

        </div>
        <div class="lMoreButton">
          <button @click="page='carddet';selectedcard=recipe;$scrollToTop(180)">LEARN MORE</button>
        </div>
      </div>
    </div>

    <div v-else id="cd-recipe-container">

      <div class="cd-card">

        <div class="cd-row">
          <div><span id='closeSpan' @click="resetbtn()">X</span></div>
          <div class="cd-header">The Water Footprint of {{ selectedcard.productdesc }}</div>
        </div>

        <div class="cd-card-flex">
          <div class="cd-col pright">
            <div class="cd-recipeImg">
              <div class="db-wfootptint">{{wfootprint(selectedcard.wfpgal)[0]}}</div>
              <img :src="selectedcard.img" class="cd-recipe-image">
            </div>
            <p class="foodInfo"><em>{{ selectedcard.whattoknow }}</em></p>
            <div class="db-wfootptint-small-div">
            <span class="db-wfootptint-small">{{wfootprint(selectedcard.wfpgal)[0]}}</span>
            <span class="bwfpPara" style="padding-left:17px"><em><b>{{wfootprint(selectedcard.wfpgal)[1]}} Water Footprint</b></em></span>
            </div>
          </div>

          <div class="cd-col pleft">

            <div class="cd-content">

              <h3 class="cd-content-ss"><em>Serving Size: {{ selectedcard.portionsize }}</em></h3>
              <h3 class="cd-content-ss"><em>Water Footprint:</em></h3>
              <div class="cd-content-text">
                <p>{{ selectedcard.wfpgal }} gallons per serving</p>
                <p>{{ Math.round(selectedcard.wfpgal * 3.7854) }} liters per serving</p>
              </div>
            </div>

            <div class="cd-icon-flex">
              <div class="cd-icon1"><p class="cd-icon">{{selectedcard.blue}}%</p></div>
              <div class="cd-icon2"><p class="cd-icon">{{selectedcard.green}}%</p></div>
              <div class="cd-icon3"><p class="cd-icon">{{selectedcard.grey}}%</p></div>
            </div>

            <div style="" class="waterdesc">
              <em><p class="bwfpPara"><b>Blue Water Footprint:</b> The amount of surface water and groundwater required (evaporated or used directly) to produce an item.</p></em>
              <em><p class="bwfpPara"><b>Green Water Footprint:</b> The amount of rainwater required (evaporated or used directly) to make an item.</p></em>
              <em><p class="bwfpPara"><b>Grey Water Footprint:</b> The amount of freshwater required to dilute the wastewater generated in manufacturing, in order to maintain water quality, as determined by state and local standards.</p></em>
            </div>

          </div>
        </div>

      </div>

    </div>

  </div>
  `
})
