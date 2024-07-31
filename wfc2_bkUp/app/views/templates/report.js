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
      '<div id="report-graph">\n  \n</div>\n\n<div id="report-table">\n  \n  <div class="report-group thead">\n    <span class="row1">Question</span>\n    <span class="row2">Answer</span>\n    <span class="row3">Gallons/Day:</span>\n    <span class="row4">You</span>\n    <span class="row5">US Average</span>\n    <span class="row6">Learn More</span>\n  </div>\n\n  <div id="report-list">\n    \n  </div>\n\n  <div id="report-footer" class="clearfix">\n  \n      <div id="report-footer--compare">\n\n            <div id="report-footer--email">\n              <p>Get your result and 3 month reminder.</p>\n              <div id="email-form">\n                <input id="email-input2"  class="email-input"  type="email" placeholder="Your Email Address">\n                <div id="email-submit2" class="email-submit pill-button"  >Submit</div>\n              </div>\n              <h2 id="email-confirmation" class="hidden">Thank you!</h2>\n            </div>\n        \n            <h3>\n              <a href="/footprints/water-footprint-calculator-methodology/" target="_blank"><span>Methodology</span></a>\n            </h3>   \n\n      </div>\n      \n      <div id="report-footer--social">\n        <a href="https://www.pinterest.com/WaterCalculator/" title="Pinterest" target="_blank"><i class="fa-pinterest-square fa-3x" data-x-icon="&#xf0d3;" aria-hidden="true"></i></a>\n      </div>\n\n      <div id="report-footer--copyright">\n        <p>\n          <a href="/about/" target="_blank">ABOUT US</a>\n          <a href="/contact-us/">CONTACT US</a>\n          <a href="#"><span class="feedback text">FEEDBACK</span></a>\n          <a href="/policy-and-terms-of-use/" target="_blank">POLICY AND TERMS OF USE</a>\n        </p>\n        <p>© 2023 EcoRise.</p>\n        <p>All Rights Reserved.</p>\n      </div>\n    \n  </div>\n</div>\n';
    return buffer;
  });
});
