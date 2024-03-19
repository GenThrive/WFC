Vue.prototype.$scrollToTop = (x) => window.scrollTo(0,x)

new Vue({
  el: '#wfcquiz',
  data() {
    return {
      step:1,
      questions:{q1:"", q2:"",q6:"",q7:""},
      mq3: { q1:"", q2:"", q3:""},
      points1: [1,1,0],
      points2: [1,1,0],
      items: [
        { id: 1, name: "66", order: 4 },
        { id: 2, name: "463", order: 3 },
        { id: 3, name: "48", order: 2 },
        { id: 4, name: "33", order: 1 },
      ],
      slider:"",
      selectedv:""
    }
  },

  methods:{
    prev() {
      this.$scrollToTop(180)
      this.step--
    },
    next() {
      this.$scrollToTop(180)
      this.step++
    },
    q1_chBox() {
      return this.questions.q1==3?1:0
    },
    q2_chBox() {
      return this.questions.q2==1?1:0
    },
    q3_chBox() {
      //Scoring for question 3
      let arr = 0;
      if(this.mq3.q3){
        arr = 0;
      } else {
        arr = (this.mq3.q1?this.points2[0]:0) + (this.mq3.q2?this.points2[1]:0);
      }      
      return arr
    },
    q4_slidersum() {
      return (this.slider > 500 && this.slider < 751) ? 1 : 0
    },
    q5_checkorder() {
      let sum = 0
      sum = this.items[0].order == 1 ? sum+1 : sum
      sum = this.items[1].order == 2 ? sum+1 : sum
      sum = this.items[2].order == 3 ? sum+1 : sum
      sum = this.items[3].order == 4 ? sum+1 : sum
      return sum
    },
    q6_chBox() {
      return this.questions.q6==3?1:0
    },
    q7_chBox() {
      return this.questions.q7==1?1:0
    },
    arrsum() {
      return this.q1_chBox() + this.q2_chBox() + this.q3_chBox() + this.q4_slidersum() + this.q5_checkorder() + this.q6_chBox() + this.q7_chBox()
    },
    reset() {
      this.$scrollToTop(180)
      this.step=1
      this.questions={q1:"", q2:"",q6:"",q7:""}
      this.mq3= { q1:"", q2:"", q3:""}
      this.points2= [1,1,0]
      this.items= [
        { id: 1, name: "66", order: 4 },
        { id: 2, name: "463", order: 3 },
        { id: 3, name: "48", order: 2 },
        { id: 4, name: "33", order: 1 },
      ],
      this.slider=""
      this.selectedv=""
    }
  },

  template: `
  
  <div id="wfcquiz"  class="box flex">

  <div class="quizContainer">
      
  <div class="frmContainer">

    <form class="qsForm">
      <div class="divQst">

        <!-- intro page -->
        <div v-show="step === 1" class="qsIntro">
          <div class="quizrow">
            <!-- <div class="column" id="colIntroIni"></div> -->
            <div class="column">
              <h3>FOOD AND WATER ARE CONNECTED.<br> TEST YOUR KNOWLEDGE.</h3>
              <p class="qsIntroP">
                Producing food requires a lot of water.
                Want to reduce your water footprint? Take this quiz to find out which foods are more or 
                less water intensive. 
              </p>
              <div class="quizrow" id="introStartBtnRow">
                <div class="column">
                  <button @click.prevent="next()" class="btnIntro btn">START THE QUIZ</button>
                </div>               
              </div>
            </div>
            <div class="column" id="colImageHome">
              <img id="imgHome" src="https://www.watercalculator.org/wp-content/uploads/2021/10/Burger.png" alt="">
            </div>
          </div>
        </div>
          
        <!-- question 1 -->
        <div v-show="step === 2" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">Does it take water to make your food?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Choose one:</p>
            <div class="quizrow">
              <label class="containerRdb" for="q1a1">I don’t know! I don’t cook, I just eat.
                <input type="radio" id="q1a1" value="1" v-model="questions.q1">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q1a1" value="1" v-model="questions.q1">
              <label for="q1a1">I don’t know! I don’t cook, I just eat.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q1a2">Only if it says “Add Water” on the box.
                <input type="radio" id="q1a2" value="2" v-model="questions.q1">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q1a2" value="2" v-model="questions.q1">
              <label for="q1a2">Only if it says “Add Water” on the box.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q1a3">Yes, crops (vegetables, fruits, grains, etc.) need water.
                <input type="radio" id="q1a3" value="3" v-model="questions.q1">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q1a3" value="3" v-model="questions.q1">
              <label for="q1a3">Yes, crops (vegetables, fruits, grains, etc.) need water.</label> -->
            </div>
          </div>
          <br>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="questions.q1 ==''" class="btn1" disabled>Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div>
        </div>

        <!-- question 2 -->
        <div v-show="step === 3" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">What about meat? Is water needed to produce it?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Choose one:</p>
            <div class="quizrow">
              <label class="containerRdb" for="q2a1" value="10">Yes! Animals need water and so do the crops they eat.
                <input type="radio" id="q2a1" value="1" v-model="questions.q2">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q2a1" value="1" v-model="questions.q2">
              <label for="q2a1" value="10">Yes! Animals need water and so do the crops they eat.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q2a2">Pass the burgers. I don’t care.
                <input type="radio" id="q2a2" value="2" v-model="questions.q2">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q2a3" value="2" v-model="questions.q2">
              <label for="q2a3">Pass the burgers. I don’t care.</label> -->
            </div>
          </div>
          <br>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="questions.q2 ==''"  disabled class="btn1">Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div>
        </div>

        <!-- question 3 -->
        <div v-show="step === 4" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">Which of the following are true statements?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Choose all that apply:</p>
            <div class="quizrow">
              <label class="containerMq" for="q3a1" value="10">Crops get water from the sky.
                <input type="checkbox" v-model="mq3.q1" id="q3a1" class="chkbox">
                <span class="checkmark"></span>
              </label>
              <!-- <input type="checkbox" v-model="mq3.q1" id="q3a1" class="chkbox">
              <label for="q3a1" value="10">Crops get water from the sky.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerMq" for="q3a2">Crops are watered from a sprinkler.
                <input type="checkbox" v-model="mq3.q2" id="q3a2" class="chkbox">
                <span class="checkmark"></span>
              </label>
              <!-- <input type="checkbox" v-model="mq3.q2" id="q3a2" class="chkbox">
              <label for="q3a2">Crops are watered from a sprinkler.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerMq" for="q3a3">Fruits and vegetables come from the grocery store. They don’t need water.
                <input type="checkbox" v-model="mq3.q3" id="q3a3" class="chkbox">
                <span class="checkmark"></span>
              </label>
              <!-- <input type="checkbox" v-model="mq3.q3" id="q3a3" class="chkbox">
              <label for="q3a3">Fruits and vegetables come from the grocery store. They don’t need water.</label> -->
            </div>
          </div>
          <br>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="mq3.q1 == '' && mq3.q2 == '' && mq3.q3 == ''" disabled class="btn1">Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div> 
        </div>

        <!-- question 4 -->
        <div v-show="step === 5" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">How many gallons of water does it take to make a cheeseburger, on average?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Move the water droplet to the correct number:</p>

            <div class="slidecontainer">
              <input type="range" min="0" max="1000" class="slider1" v-model="slider">
            </div>
            <div class="sliderGallons galMarker">
              <label for="">|</label>
              <label for="">|</label>
              <label for="">|</label>
              <label for="">|</label>
              <label for="">|</label> 
            </div>
            <div class="sliderGallons galText">
              <label for="" class="tALeft">0 <br> gallons</label>
              <label for="">250 <br> gallons</label>
              <label for="" class="tACenter">500 <br> gallons</label>
              <label for="">750 <br> gallons</label>
              <label for="" class="tARight">1000 <br> gallons</label>
            </div>
            <br>
            <br>Value: {{slider}} gallons
          </div>
          <br>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="slider == ''" disabled class="btn1">Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div>
        </div>

        <!-- question 5 -->
        <div v-show="step === 6" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">How many gallons of water does it take to make…?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Drag and drop the number of gallons to the correct food:</p>
          </div>
          <div class="quizrow rowDnD">
            <div class="column1" @click="selectedv=true">
              <draggable
                v-model="items"
                :group="items"
                class="flex2"
                :animation="200"
                @change="selectedv=true"
              >
                <div v-for="item in items" :key="item.id" class="itemx file noselect" @click="selectedv=true">
                  {{ item.name }} gal.
                </div>
              </draggable>
            </div>
            
            <div class="column">
              <div class="nmovable">
                <img src="https://www.watercalculator.org/wp-content/uploads/2021/10/apple.png" alt="">
                <label>1 apple (medium)</label>
              </div>
              <div class="nmovable">
                <img src="https://www.watercalculator.org/wp-content/uploads/2021/10/cheese.png" alt="">
                <label>1 serving of cheese (2 ounces)</label>
              </div>
              <div class="nmovable">
                <div><img src="https://www.watercalculator.org/wp-content/uploads/2021/10/steak.png" alt=""></div>
                <div><label> 1 steak (4 ounces)</label></div>
              </div>
              <div class="nmovable">
                <div><img src="https://www.watercalculator.org/wp-content/uploads/2021/10/mug.png" alt=""></div>
                <div><label>1 cup of coffee  (8 ounces)</label></div>
              </div>
            </div>
          </div>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="selectedv == ''" disabled class="btn1">Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div>
        </div>

        <!-- question 6 -->
        <div v-show="step === 7" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">A latte made with which “milk” uses the <i>least</i> amount of water?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Choose one:</p>
            <div class="quizrow">
              <label class="containerRdb" for="q6a1">Cow’s milk
                <input type="radio" id="q6a1" value="1" v-model="questions.q6">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q6a1" value="1" v-model="questions.q6">
              <label for="q6a1">Cow’s milk</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q6a2">Almond milk
                <input type="radio" id="q6a2" value="2" v-model="questions.q6">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q6a2" value="2" v-model="questions.q6">
              <label for="q6a2">Almond milk</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q6a3">Oat milk
                <input type="radio" id="q6a3" value="3" v-model="questions.q6">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q6a3" value="3" v-model="questions.q6">
              <label for="q6a3">Oat milk</label> -->
            </div>
          </div>
          <br>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="questions.q6 == ''" disabled class="btn1">Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div>
        </div>

        <!-- question 7 -->
        <div v-show="step === 8" class="qsContainer">
          <p class="qNumber"><b>{{step-1}}</b> of 7</p>
          <h3 class="qTitle">Which of these actions wastes water?</h3>
          <div class="qsAnswers">
            <p class="pChoose">Choose one:</p>
            <div class="quizrow">
              <label class="containerRdb" for="q7a1">Throwing away leftover food.
                <input type="radio" id="q7a1" value="1" v-model="questions.q7">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q7a1" value="1" v-model="questions.q7">
              <label for="q7a1">Throwing away leftover food.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q7a2">Eating everything on your plate.
                <input type="radio" id="q7a2" value="2" v-model="questions.q7">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q7a2" value="2" v-model="questions.q7">
              <label for="q7a2">Eating everything on your plate.</label> -->
            </div>
            <div class="quizrow">
              <label class="containerRdb" for="q7a3">Wrapping up leftovers and eating them later.
                <input type="radio" id="q7a3" value="3" v-model="questions.q7">
                <span class="radioBtn"></span>
              </label>
              <!-- <input type="radio" id="q7a3" value="3" v-model="questions.q7">
              <label for="q7a3">Wrapping up leftovers and eating them later.</label> -->
            </div>
          </div>
          <br>
          <div class="qsButtons">
            <button @click.prevent="prev()" class="btn">Back</button>
            <button v-if="questions.q7 == ''" disabled class="btn1">Next</button>
            <button v-else @click.prevent="next()" class="btn">Next</button>
          </div>
        </div>

        <!-- results page -->
        <div v-show="step === 9" class="qsFinal">
          <div class="qfsScore">
            <h3>Thanks for taking our quiz!</h3>
            <p>Ready to learn more?</p> 
            <span>YOU SCORED: <b>{{arrsum()}}</b> OUT OF 11</span>
          </div>
          <div class="qsFinalScore">
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">Does it take water to make your food?</label>
                <label class="qfsBottom">It takes a lot of water to grow and process all the food we eat.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://www.watercalculator.org/footprint/foods-big-water-footprint" method="get" target="_blank">
                  <button class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">What about meat? Does it require water to produce?</label>
                <label class="qfsBottom">Animals eat a lot of plants, which need a lot of water to grow.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://www.watercalculator.org/news/articles/eat-less-water" method="get" target="_blank">
                  <button  class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">Which of the following are true statements?</label>
                <label class="qfsBottom">It takes both irrigation water and rainwater to produce our food.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://www.watercalculator.org/footprint/rainwater-green-water-footprint" method="get" target="_blank">
                  <button  class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">How many gallons of water does it take to make a cheeseburger, on average?</label>
                <label class="qfsBottom">It takes about 600 gallons to make a cheeseburger.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://www.watercalculator.org/footprint/meat-portions-900-gallons" method="get" target="_blank">
                  <button  class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">How many gallons of water does it take to make…?</label>
                <label class="qfsBottom">Steak takes the most and an apple takes the least.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://www.watercalculator.org/footprint/foods-big-water-footprint" method="get" target="_blank">
                  <button  class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">A latte made with which “milk” uses the least amount of water?</label>
                <label class="qfsBottom">Oat milk is the least water-intensive choice.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://foodprint.org/blog/which-plant-based-milk-is-best-for-the-environment" method="get" target="_blank">
                  <button  class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <div class="qsFS1">
              <div class="qsFS2">
                <label class="qfsTop">Which of these actions wastes water?</label>
                <label class="qfsBottom">Throwing away food — including leftovers — wastes water it took to produce that food.</label>
              </div>
              <div class="qsFinalLearnMore">
                <form action="https://foodprint.org/issues/the-problem-of-food-waste" method="get" target="_blank">
                  <button  class="qsFSLearnMore btn">LEARN MORE</button>
                </form>
              </div>
            </div>
            <br>
            <div class="qsButtons revPage">
              <button class="btn" @click.prevent="reset()">START OVER</button>
              <form action="https://www.watercalculator.org/water-footprint-of-food-guide" method="get" target="_blank">
                <button class="btn">FIND YOUR FOOD'S WATER FOOTPRINT</button>
              </form>
            </div>
          </div>
        
        </div>

      </div>
    </form>
    <br> 
  </div>
</div>
</div>
  `
})