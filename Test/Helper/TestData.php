<?php

namespace Test\Helper;

class TestData
{
    const HTML_CONTENT = '<html><body><div class="package no-default">
    <div class="collapsibleTab no-default" data-role="collapsible">
      <div data-role="trigger">
        <div class="header">
          <h3>Option 3600 Mins</h3>
        </div>
      </div>
    </div>
    <div class="collapsibleContent" data-role="content">
      <div class="product-item-info" data-container="product-grid">
        <div class="product details product-item-details">
          <div class="package-features">
            <ul>
              <li>
                <div class="package-description">
                  The optimum subscription providing you with extra service time
                  to support the above-average user and allow access from your
                  Videx device.
                </div>
              </li>
              <li>
                <div class="package-name">
                  <p>
                    Up to 300 Minutes Talk time per month or 3600 Minutes per
                    year<br />Includes 40 SMS / month or 480 / year<br />(5p / min
                    and 4p / SMS thereafter)
                  </p>
                </div>
              </li>
              <li>
                <div class="package-data">
                  12 Months - Voice & SMS Service Only
                </div>
              </li>
              <li>
                <div class="package-support">
                  Videx Support: 08:00 - 19:00 Mon - Fri
                </div>
              </li>
            </ul>
            <div class="bottom-row">
              <div class="row">
                <div class="col-xs-6 first-column">
                  <div class="price-title">Pay Annually</div>
                  <div class="package-price">
                    <span class="price-big">£174.00</span>
                    <span class="subscription-type">per year</span>
                  </div>
                  <div class="you-save">Save £17.95</div>
  
                  <div class="actions-primary">
                    <button class="add-subscription button middle" id="10">
                      Choose
                    </button>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="price-title">Pay Monthly</div>
                  <div class="package-price monthly">
                    <span class="price-big">£16.00</span>
                    <span class="subscription-type">per month</span>
                  </div>
                  <div class="actions-primary">
                    <button class="add-subscription button middle" id="16">
                      Choose
                    </button>
                  </div>
                </div>
              </div>
              <div class="product-note"></div>
            </div>
          </div>
  
          <div class="product-item-inner">
            <div class="product actions product-item-actions"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body></html>';

    const JSON_CONTENT = '[
        {
            "option_title": "Option 3600 Mins",
            "description": " Up to 300 Minutes Talk time per month or 3600 Minutes per\n        year<br \/>Includes 40 SMS \/ month or 480 \/ year<br \/>(5p \/ min\n        and 4p \/ SMS thereafter)",
            "price": 174,
            "discount": 17.95
        }
    ]';

    const ARRAY_CONTENT =  [[
        "option_title" => "Option 3600 Mins",
        "description" => " Up to 300 Minutes Talk time per month or 3600 Minutes per
        year<br />Includes 40 SMS / month or 480 / year<br />(5p / min
        and 4p / SMS thereafter)",
        "price" => 174,
        "discount" => 17.95
    ]];
}
