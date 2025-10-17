<div class="faq-area pt-100 pb-70 section-bg-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faq-content faq-content-bg">
                    <div class="section-title">
                        <h2>Let's Start a Free of Questions and Get a Quick Support</h2>
                    </div>

                    <div class="faq-accordion">
                        <ul class="accordion">
                            @foreach ($answers as $answer)
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-chevron-down'></i>
                                        {{ $answer->faq->question }}
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            {{ $answer->answer }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-img-2">
                    <img src="{{ asset('default-images/questionnaire.jpg') }}" style="height: 600px; width:100%" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>
