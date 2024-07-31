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
    var buffer = "";

    buffer +=
      '<div id="report-graph">\n  \n</div>\n\n<div id="report-table">\n  <div class="report-group thead">\n    <span class="row1">Pregunta</span\n    ><span class="row2">Respuesta</span\n    ><span class="row3">Galones/Día:</span\n    ><span class="row4">Su</span\n    ><span class="row5">Promedio EEUU</span\n    ><span class="row6">Mas Info</span>\n  </div>\n\n  <div id="report-list">\n    \n  </div>\n\n  <div id="report-footer" class="clearfix">\n  \n    <div id="report-footer--compare">\n   \n      <h3>\n        <a href="/como-ahorrar-agua/metodologia-de-calculadora-de-huella-hidrica/" target="_blank"><span>Metodología</span>\n      </h3>\n   \n    </div>\n\n    <div id="report-footer--social">\n      <a href="https://www.pinterest.com/WaterCalculator/" title="Pinterest" target="_blank"><i class="fa-pinterest-square fa-3x" data-x-icon="&#xf0d3;" aria-hidden="true"></i></a>\n    </div>\n\n    <div id="report-footer--copyright">\n      <p>\n        <a href="/about/" target="_blank">ABOUT US</a>\n        <a href="/contact-us/">CONTACT US</a>\n        <a href="#"><span class="feedback text">FEEDBACK</span></a>\n        <a href="/policy-and-terms-of-use/" target="_blank">POLICY AND TERMS OF USE</a>\n      </p>\n      <p>© 2023 EcoRise. All&nbsp;Rights&nbsp;Reserved.</p>\n    </div>\n\n\n  </div>\n</div>\n\n';
    return buffer;
  });
});
