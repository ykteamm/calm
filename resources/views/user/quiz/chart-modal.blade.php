<div class="modal fade " id="quizChartModal" aria-hidden="true" aria-labelledby="quizChartModalLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen modal-xl">
        <div class="modal-content rounded rounded-0" style="padding: 30px">
            <div class="modal-header pb-2 border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="p-5 pt-0 bg-white">
                <h5 class="quiz-info-title w-60 text-center" style="line-height: 2rem;font-size: 1.5625rem;">
                  YOUR HORMONAL STATUS
                </h5>
                <div class="row pt-5" style="margin-top: 40px">
                    @foreach ($steroids as $steroid)
                      <div class="col-12 mt-5 pt-5">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-header text-center">
                              <span style="font-size:21px;font-weight:700">
                                {{$steroid->translation->name}}
                              </span>
                            </div>
                            <div class="card-body pl-2 py-0">
                              <div class="text-center">
                                <img src="https://images.prismic.io/thesis-shopify/e1c18ab3-0b9a-45a6-80a4-6eca547b1de9_Energy.jpg"
                                style="width: 300px;" alt="...">
                              </div>
                              <div class="d-flex justify-content-between btn btn-secondary">
                                <div>
                                    Your degree
                                </div>
                                <button class="btn btn-success btn-sm">
                                  <h6 class="text-white">{{$steroid->chart}}</h6>
                                </button>
                              </div>
                              <div class="btn btn-secondary d-flex justify-content-between mt-1">
                                <div>
                                    In average condition
                                </div>
                                <button class="btn btn-success btn-sm">
                                  <h6 class="text-white">{{$steroid->avg}}</h6>
                                </button>
                              </div>
                            </div>
                            <div class="card-footer border-0">
                              <div>
                                <span style="color: blue">{{$steroid->info->translation->name}}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
