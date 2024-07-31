define(["handlebars"], function (Handlebars) {
  return Handlebars.template(function (
    Handlebars,
    depth0,
    helpers,
    partials,
    data
  ) {
    this.compilerInfo = [4, ">= 1.0.0"];
    helpers = this.merge(helpers, Handlebars.helpers);
    data = data || {};
    var buffer = "",
      stack1,
      self = this;

    function program1(depth0, data) {
      return '\n      <div class="pill-button" role="button" id="start-btn">\n        <span>Get Started</span>\n        <span class="icon icon-chevron-right"></span>\n      </div>\n    ';
    }

    function program3(depth0, data) {
      var buffer = "",
        stack1;
      buffer += "\n\n      ";
      stack1 = helpers["if"].call(depth0, depth0 && depth0.isComplete, {
        hash: {},
        inverse: self.program(6, program6, data),
        fn: self.program(4, program4, data),
        data: data,
      });
      if (stack1 || stack1 === 0) {
        buffer += stack1;
      }
      buffer +=
        '\n\n      <div class="pill-button" role="button" id="restart-btn">\n        <span>Restart</span>\n        <span class="spin"><span class="flip icon icon-clockwise"></span></span>\n      </div>\n    ';
      return buffer;
    }
    function program4(depth0, data) {
      return '\n        <div class="pill-button" role="button" id="complete-btn">\n          <span>View Score</span>\n          <span class="icon icon-chevron-right"></span>\n        </div>\n      ';
    }

    function program6(depth0, data) {
      return '\n        <div class="pill-button" role="button" id="continue-btn">\n          <span>Continue</span>\n          <span class="icon icon-chevron-right"></span>\n        </div>\n      ';
    }

    buffer +=
      '<div class="content-container">\n  <h1 class="start-h1">What’s your water footprint?</h1>\n  <p>This calculator helps you estimate your total water use. You know water comes from the tap, but do you know how much water goes into your sandwich? Your gadgets? The electricity that powers them? Soon you will!</p>\n\n  <div class="options">\n    ';
    stack1 = helpers["if"].call(depth0, depth0 && depth0.isFirst, {
      hash: {},
      inverse: self.program(3, program3, data),
      fn: self.program(1, program1, data),
      data: data,
    });
    if (stack1 || stack1 === 0) {
      buffer += stack1;
    }
    buffer +=
      '\n  </div>\n\n  <div class="feature">\n    <p><a href="/esp/">¿Cuál es su Huella Hídrica?</a></p>\n  </div>\n\n  <div class="divider-welcomePage">\n    <p class="question-text">\n      <a href="/intro/" target="_blank">Dive deeper</a><br>\n      <span class="caption">Tips, articles and educational material</span>\n    </p>\n  </div>\n  <a href="/save-water/" target="_blank">\n    <div class="category-ui dive-btn">\n      <div class="category-title">Save Water</div>\n    </div>\n  </a>\n  <a href="/water-use/" target="_blank">\n    <div class="category-ui dive-btn">\n      <div class="category-title">Water Use</div>\n    </div>\n  </a>\n  <a href="/education/" target="_blank">\n    <div class="category-ui dive-btn">\n      <div class="category-title">Education</div>\n    </div>\n  </a>\n  \n  \n\n  <div class="social">\n    <a href="https://www.pinterest.com/WaterCalculator/" title="Pinterest" target="_blank"><i class="fa-pinterest-square fa-3x" data-x-icon="&#xf0d3;" aria-hidden="true"></i></a>\n  </div>\n\n  <div class="disclaimer">\n    <p>This calculator relies on US national averages and approximations and is for people living in the US. Your results should be considered an estimate.</p>\n  </div>\n\n  <div class="footer">\n    <p>\n      <a href="/about/" target="_blank">ABOUT US</a>\n      <a href="/contact-us/">CONTACT US</a>\n      <a href="#"><span class="feedback text">FEEDBACK</span></a>\n      <a href="/policy-and-terms-of-use/" target="_blank">POLICY AND TERMS OF USE</a>\n    </p>\n    <p>© 2023 EcoRise. All&nbsp;Rights&nbsp;Reserved.</p>\n  </div>\n\n</div>\n\n<script>\n    //special campaign requirements for displaying WFC in iframe on savethedropla.org\n    if ( window.location !== window.parent.location ) {\n      //app is being run inside an iframe\n      if ( document.referrer.indexOf(\'savethedropla\') > -1 ) {\n        document.getElementById(\'social\').style.visibility = \'hidden\';\n      }\n    } \n</script>\n';
    return buffer;
  });
});
