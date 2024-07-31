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
      return '\n      <div class="pill-button" role="button" id="start-btn">\n        <span>Comenzar</span>\n        <span class="icon icon-chevron-right"></span>\n      </div>\n    ';
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
        '\n\n      <div class="pill-button" role="button" id="restart-btn">\n        <span>Volver al inicio</span>\n        <span class="spin"><span class="flip icon icon-clockwise"></span></span> \n      </div>\n    ';
      return buffer;
    }
    function program4(depth0, data) {
      return '\n        <div class="pill-button" role="button" id="complete-btn">\n          <span>Ver sus resultados</span>\n          <span class="icon icon-chevron-right"></span>\n        </div>\n      ';
    }

    function program6(depth0, data) {
      return '\n        <div class="pill-button" role="button" id="continue-btn">\n          <span>Siguiente</span>\n          <span class="icon icon-chevron-right"></span>\n        </div>\n      ';
    }

    buffer +=
      '<div class="content-container">\n  <h1 class="start-h1">¿Cuál es su Huella Hídrica?</h1>\n  <p>Esta calculadora le ayuda a estimar su uso total de agua. Seguramente sabe que el agua proviene de la llave, pero ¿tiene idea de cuánta agua hay en su sándwich? ¿En sus aparatos eléctricos, y en la electricidad que los alimenta? Pronto lo sabrá.</p>\n\n  <div class="options">\n    ';
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
      '\n  </div>\n\n  <div class="feature">\n    <p><a href="/">What\'s Your Water Footprint?</a></p>\n  </div>\n\n  <div class="divider-welcomePage">\n    <p class="question-text">\n      <a href="#"></a>Aprende más</a><br>\n      \n    </p>\n  </div>\n  <a href="/como-ahorrar-agua/" target="_blank">\n    <div class="category-ui dive-btn">\n      <div class="category-title">Cómo Ahorrar Agua</div>\n    </div>\n  </a>\n  \n  \n\n  <div class="social">\n    <a href="https://www.pinterest.com/WaterCalculator/" title="Pinterest" target="_blank"><i class="fa-pinterest-square fa-3x" data-x-icon="&#xf0d3;" aria-hidden="true"></i></a>\n  </div>\n\n  <div class="disclaimer">\n    <p>Esta calculadora se basa en los promedios y aproximaciones nacionales de EE. UU. y es para personas que viven en los Estados Unidos. Sus resultados deben considerarse una estimación.</p>\n  </div>\n\n  <div class="footer">\n    <p>\n      <a href="/about/" target="_blank">ABOUT US</a>\n      <a href="/contact-us/">CONTACT US</a>\n      <a href="#"><span class="feedback text">FEEDBACK</span></a>\n      <a href="/policy-and-terms-of-use/" target="_blank">POLICY AND TERMS OF USE</a>\n    </p>\n    <p>© 2023 EcoRise. All&nbsp;Rights&nbsp;Reserved.</p>\n  </div>\n\n</div>\n\n<script>\n    //special campaign requirements for displaying WFC in iframe on savethedropla.org\n    if ( window.location !== window.parent.location ) {\n      //app is being run inside an iframe\n      if ( document.referrer.indexOf(\'savethedropla\') > -1 ) {\n        document.getElementById(\'social\').style.visibility = \'hidden\';\n      }\n    } \n</script>\n';
    return buffer;
  });
});
