<template>
  <div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
      <img
        src="/front-assets/images/background/2.jpg"
        class="jarallax-img"
        alt=""
      />
      <div class="center-y relative text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Cars</h1>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- section close -->

    <section id="section-cars">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
              <div class="item_filter_group">
                <h4>Vehicle Type</h4>
                <div class="de_form">
                  @foreach ($vehicleTypes as $type)
                  <div class="de_checkbox">
                    <input
                      id="{{ 'vehicleType' . $type->id }}"
                      name="vehicle_types[]"
                      type="checkbox"
                      value="{{ $type->id }}"
                    />
                    <label for="{{ 'vehicleType' . $type->id }}">
                      {{ $type->name }}
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="item_filter_group">
                <h4>Car Body Type</h4>
                <div class="de_form">
                  @foreach ($bodyTypes as $type)
                  <div class="de_checkbox">
                    <input
                      id="{{ 'bodyType' . $type->id }}"
                      name="body_types[]"
                      type="checkbox"
                      value="{{ $type->id }}"
                    />
                    <label for="{{ 'bodyType' . $type->id }}">
                      {{ $type->name }}
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="item_filter_group">
                <h4>Car Seats</h4>
                <div class="de_form">
                  @foreach ($seats as $seat)
                  <div class="de_checkbox">
                    <input
                      id="{{ 'seat' . $seat->id }}"
                      name="seats[]"
                      type="checkbox"
                      value="{{ $seat->id }}"
                    />
                    <label for="{{ 'seat' . $seat->id }}">
                      {{ $seat->name }}
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="item_filter_group">
                <h4>Car Engine Capacity (cc)</h4>
                <div class="de_form">
                  @foreach ($engines as $engine)
                  <div class="de_checkbox">
                    <input
                      id="{{ 'engine' . $engine->id }}"
                      name="engines[]"
                      type="checkbox"
                      value="{{ $engine->id }}"
                    />
                    <label for="{{ 'engine' . $engine->id }}">
                      {{ $engine->name }}
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="item_filter_group">
                <h4>Price ($)</h4>
                <div class="price-input">
                  <div class="field">
                    <span>Min</span>
                    <input type="number" class="input-min" value="0" />
                  </div>
                  <div class="field">
                    <span>Max</span>
                    <input type="number" class="input-max" value="2000" />
                  </div>
                </div>
                <div class="slider">
                  <div class="progress"></div>
                </div>
                <div class="range-input">
                  <input
                    type="range"
                    class="range-min"
                    min="0"
                    max="2000"
                    value="0"
                    step="1"
                  />
                  <input
                    type="range"
                    class="range-max"
                    min="0"
                    max="2000"
                    value="2000"
                    step="1"
                  />
                </div>
              </div>
            
          </div>

          <div class="col-lg-9">
            <div class="row">
              @foreach ($cars as $car)
              <div class="col-xl-4 col-lg-6">
                <x-car :car="$car" />
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
