@extends('frontend.layouts.main')
@section('title', 'Blogs Details')
@section('content')
<!-- Read Progress Bar -->
<div class="reading-progress-bar"></div>

<section class="blog-hero py-2" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);padding: 3rem 0;">
   <div class="university_title">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col">
               <div class="university_airplane d-flex justify-content-center"></div>
               <div class="universities_heading text-center">
                  <h1 class="fw-bold mx_rounded text-black mb-4 animate-title">{{$blog->title}}</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="blog-content pb-4 pt-3">
   <div class="quick_selection_title">
      <div class="rs-inner-blog orange-color">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="blog-deatails bg-white rounded-1 ">
                     <div class="blog-full  py-2">
                        <ul class="single-post-meta list-unstyled d-flex align-items-center mb-4 ">
                           <li>
                              <span class="p-date text-muted">
                                 <i class="fa fa-calendar-check-o me-2"></i>
                                 {{date('F d, Y', strtotime($blog->created_at))}}
                              </span>
                           </li>
                        </ul>

                        <div class="bs-img mb-4 shadow-lg">
                           <img src="{{asset('imagesapi/'.$blog->image)}}"
                              alt="{{$blog->title}}"
                              class="w-100 rounded-3 shadow-sm lazy-load">
                        </div>
                        <div class="row">
                           <div class="col-md-8">
                              <div class="mba-program mt-4">
                                 <div class="program-degree">
                                    <h3 class="fw-bold">Top Executive MBA Programs in the UK for Indian Professionals 2025</h3>
                                    <ul class="entry-meta d-flex p-0 gap-4 list-unstyled " data-type="label:slash">
                                       <li class="meta-date"><span>Last Updated On</span><time class="ct-meta-element-date" datetime="2025-06-10T12:39:13+00:00">June 10, 2025</time></li>
                                       <!-- <li class="meta-categories" data-type="simple"><span>Published In</span><a href="https://leapscholar.com/blog/category/study-in-the-uk/" rel="tag" class="ct-term-9">Study in UK 🇬🇧</a></li> -->
                                    </ul>
                                    <!-- <span class="rt-reading-time" style="display: block;"><span class="rt-label rt-prefix"></span> <span class="rt-time">7</span> <span class="rt-label rt-postfix">min read</span></span> -->
                                 </div>
                                 <div class="program-degree-para">
                                    <p class="text-justify">An Executive MBA (EMBA) program typically lasts <strong>12 to 24 months</strong>, depending on the university and program format. Most EMBA programs are designed to accommodate working professionals, offering them in<strong> part-time, weekend, or modular formats</strong>
                                    </p>
                                 </div>
                                 <div class="ls-dev-form-container">
                                    <div>
                                       <div class="ls-dev-form-title">
                                          <div class="ls-dev-form-header">
                                             <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/scholar_hat.svg" alt="scholar_hat" width="44px" height="38px" style="margin-right: 10px;" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/scholar_hat.svg"
                                                   alt="scholar_hat" width="44px" height="38px" style="margin-right: 10px;" /></noscript>
                                             <div id="ideal-heading">
                                                Find out your ideal
                                                <span style="color: var(--ls-dev-primary-color); font-family: Poppins;
                                                   font-size: 20px !important; line-height: 26px !important;
                                                   font-weight: 600 !important;
                                                   ">MBA university</span>
                                             </div>
                                          </div>
                                          <div class="ls-dev-progress-indicator">
                                             <div class="ls-dev-circular-progress-bar" style="--progress: 0%">
                                                <span class="ls-dev-progress-percentage">0%</span>
                                             </div>
                                          </div>
                                       </div>

                                       <!-- Step 1 -->
                                       <div class="ls-dev-step active" data-step="1">
                                          <div>
                                             <p class="ls-dev-heading-name">Which country do you want to study in?</p>
                                             <div class="ls-dev-error-message">Please select an option</div>
                                             <div class="ls-dev-options-container" style="margin-bottom: 24px;" data-question="preferredCountry">
                                                <div class="ls-dev-option ls-dev-contry" data-value="UK">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/uk_flag.svg" width="24" height="24" alt="UK flag" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/uk_flag.svg"
                                                         width="24" height="24" alt="UK flag" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">UK</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry" data-value="USA">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/usa_flag.svg" width="24" height="24" alt="USA flag" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/usa_flag.svg"
                                                         width="24" height="24" alt="USA flag" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">USA</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry selected" data-value="Germany">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/german_flag.svg" width="24" height="24" alt="Germany flag" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/german_flag.svg"
                                                         width="24" height="24" alt="Germany flag" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">Germany</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry" data-value="Australia">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/australia_flag.svg" width="24" height="24" alt="Australia flag" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/australia_flag.svg"
                                                         width="24" height="24" alt="Australia flag" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">Australia</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry" data-value="Ireland">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/ireland_flag.svg" width="24" height="24" alt="Ireland flag" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/ireland_flag.svg"
                                                         width="24" height="24" alt="Ireland flag" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">Ireland</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry" data-value="NewZealand">

                                                   <span>
                                                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <g clip-path="url(#clip0_757_6491)">
                                                            <path d="M24.0005 12C24.0005 18.6274 18.6279 24 12.0005 24C5.37311 24 0.000488281 18.6274 0.000488281 12C0.000488281 12.0029 12.0005 0.0013125 12.0005 0C18.6279 0 24.0005 5.37262 24.0005 12Z" fill="#0052B4"></path>
                                                            <path d="M11.9683 12.0009H12.0004C12.0004 11.9901 12.0004 11.9796 12.0004 11.9688C11.9897 11.9795 11.979 11.9902 11.9683 12.0009Z" fill="#F0F0F0"></path>
                                                            <path d="M12.0005 6.26086C12.0005 4.14937 12.0005 2.76586 12.0005 0H11.9985C5.37199 0.001125 0.000488281 5.37323 0.000488281 12H6.26135V8.47448L9.78691 12H11.9684C11.9791 11.9893 11.9898 11.9786 12.0005 11.9679C12.0005 11.1594 12.0005 10.4381 12.0005 9.78647L8.47493 6.26086H12.0005Z" fill="#F0F0F0"></path>
                                                            <path d="M6.07149 1.56641C4.19466 2.63511 2.63438 4.19539 1.56567 6.07222V12.0012H4.69613V4.69695V4.69686H12.0005C12.0005 3.70953 12.0005 2.76894 12.0005 1.56641H6.07149Z" fill="#D80027"></path>
                                                            <path d="M12.0006 10.5251L7.73715 6.26172C7.73715 6.26172 6.26147 6.26181 6.26147 6.26172V6.26181L12.0005 12.0008H12.0006C12.0006 12.0008 12.0006 10.9833 12.0006 10.5251Z" fill="#D80027"></path>
                                                            <path d="M20.7816 8.90625L21.0406 9.70341H21.8787L21.2006 10.1961L21.4597 10.9932L20.7816 10.5006L20.1034 10.9932L20.3625 10.1961L19.6843 9.70341H20.5225L20.7816 8.90625Z" fill="#D80027"></path>
                                                            <path d="M17.7854 14.6445L18.174 15.8403H19.4312L18.414 16.5792L18.8026 17.775L17.7854 17.036L16.7682 17.775L17.1568 16.5792L16.1396 15.8403H17.3969L17.7854 14.6445Z" fill="#D80027"></path>
                                                            <path d="M17.8985 5.25391L18.2223 6.25042H19.27L18.4223 6.86613L18.7462 7.86259L17.8985 7.2467L17.0509 7.86259L17.3747 6.86613L16.5271 6.25042H17.5748L17.8985 5.25391Z" fill="#D80027"></path>
                                                            <path d="M15.0157 8.87109L15.4042 10.0669H16.6614L15.6442 10.8058L16.0328 12.0015L15.0157 11.2626L13.9985 12.0015L14.3871 10.8058L13.3699 10.0669H14.6271L15.0157 8.87109Z" fill="#D80027"></path>
                                                         </g>
                                                         <defs>
                                                            <clipPath id="clip0_757_6491">
                                                               <rect width="24" height="24" fill="white" transform="translate(0.000488281)"></rect>
                                                            </clipPath>
                                                         </defs>
                                                      </svg>

                                                   </span>
                                                   <span class="ls-dev-option-text">New Zealand</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry" data-value="Canada">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/canada_flag.svg" width="24" height="24" alt="Canada flag" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/canada_flag.svg"
                                                         width="24" height="24" alt="Canada flag" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">Canada</span>
                                                </div>
                                                <div class="ls-dev-option ls-dev-contry" data-value="Other">
                                                   <img decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/other_country_flag.svg" width="24" height="24" alt="Other country" class="ls-dev-option-icon lazyloaded" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" src="https://d14lg9nzq1d3lc.cloudfront.net/astro_tapri/assets/images/other_country_flag.svg"
                                                         width="24" height="24" alt="Other country" class="ls-dev-option-icon" /></noscript>
                                                   <span class="ls-dev-option-text">Other</span>
                                                </div>
                                             </div>
                                          </div>

                                          <div>
                                             <p class="ls-dev-heading-name">Do you have a valid passport?</p>
                                             <div class="ls-dev-error-message">Please select an option</div>
                                             <div class="ls-dev-options-container" data-question="passportStatus" style="margin-bottom: 15px;">
                                                <div class="ls-dev-option selected" data-value="BEARER">Yes</div>
                                                <div class="ls-dev-option" data-value="APPLIED">Applied</div>
                                                <div class="ls-dev-option" data-value="PENDING">No</div>
                                             </div>
                                          </div>
                                       </div>


                                    </div>

                                    <!-- Navigation Buttons -->
                                    <div class="ls-dev-buttons">
                                       <div id="ls-dev-prevBtn" style="margin: auto 0px; display: none; cursor: pointer;">
                                          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <rect x="4" y="44" width="40" height="40" rx="20" transform="rotate(-90 4 44)" fill="#F5F5F7"></rect>
                                             <mask id="mask0_997_793" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="16" y="16" width="16" height="16">
                                                <rect width="16" height="16" transform="matrix(-1 8.74228e-08 8.74228e-08 1 32 16)" fill="#D9D9D9"></rect>
                                             </mask>
                                             <g mask="url(#mask0_997_793)">
                                                <path d="M22.3512 24L27.2512 19.1C27.4179 18.9334 27.4985 18.7361 27.4929 18.5084C27.4873 18.2806 27.4012 18.0834 27.2346 17.9167C27.0679 17.75 26.8707 17.6667 26.6429 17.6667C26.4151 17.6667 26.2179 17.75 26.0512 17.9167L20.9346 23.05C20.8012 23.1834 20.7012 23.3334 20.6346 23.5C20.5679 23.6667 20.5346 23.8334 20.5346 24C20.5346 24.1667 20.5679 24.3334 20.6346 24.5C20.7012 24.6667 20.8012 24.8167 20.9346 24.95L26.0679 30.0834C26.2346 30.25 26.429 30.3306 26.6512 30.325C26.8735 30.3195 27.0679 30.2334 27.2346 30.0667C27.4012 29.9 27.4846 29.7028 27.4846 29.475C27.4846 29.2472 27.4012 29.05 27.2346 28.8834L22.3512 24Z" fill="#2E2C57"></path>
                                             </g>
                                          </svg>
                                       </div>
                                       <button id="ls-dev-nextBtn">Continue</button>
                                    </div>

                                    <!-- Fixed CTA -->
                                    <div class="ls-dev-fixed-cta-container" style="display: none;">
                                       <button class="ls-dev-fixed-cta" style="margin: auto;">Continue</button>
                                    </div>
                                 </div>
                                 <div class="exclusive -offer mt-3">
                                    <p>Did you know that around 30% of Executive MBA students are international in the
                                       UK?</p>
                                    <p>The UK has 30+ top business schools, offering a global perspective on management, innovation, and entrepreneurship. </p>
                                    <i class="fw-bold">Whether pursued full-time, part-time, online, or through a hybrid format, top executive MBA programs in the UK can advance your career to the next level and provide the
                                       tools needed to thrive in senior leadership roles.</i>
                                 </div>
                                 <div class="hike-program">
                                    <p>Let’s look at the benefits of pursuing top executive MBA programs in the UK:</p>
                                    <ol>
                                       <li class="fw-bold mb-3">World-Ranked Business Schools with International Recognition</li>
                                       <p>The UK boasts several of the top 10 Executive MBA schools in the world. For example,
                                          London Business School (LBS) consistently ranks among the top 5 worldwide for EMBA programs
                                          (QS Global EMBA Rankings). These schools have world-class faculty, global residencies, and cross-border
                                          leadership experience, rendering UK EMBAs internationally portable and highly valued by multinational
                                          employers.</p>
                                       <li class="fw-bold mb-3">Post-Study Work Visa (Graduate Route)</li>
                                       <p>Overseas EMBA students studying in the UK qualify for the 2-year Graduate Route visa upon graduation. This permits them to remain and work in the UK without sponsorship, providing flexibility to change jobs, start a business, or acquire UK experience.</p>
                                       <li class="fw-bold mb-3">Instant Career and Pay Hike</li>
                                       <p>Students of the UK EMBA can expect a 15-25% rise in salary within a year of graduation. LBS and Oxford Saïd statistics show graduates transitioning into C-suite positions, such as Chief Operating Officer, Director, or Partner-level designation. Most students get promoted while still in school, reflecting the live ROI offered by the EMBA.</p>
                                       <li class="fw-bold mb-3">Top-Drawing Networking and Industry Exposure</li>
                                       <p>Pursuing an EMBA in the UK links you to a global class of senior professionals from more than 50+ countries. This provides access to worldwide alumni networks, worldwide projects, and business mentors at firms such as McKinsey, Barclays, Amazon, and PwC. Networking in places like London provides access to venture capitalists, startup incubators, and international recruiters.</p>
                                       <li class="fw-bold mb-3">Employer Sponsorship & Modular Flexibility</li>
                                       <p>Most UK EMBA offerings have modular formats (e.g., one week every 6–8 weeks), which enable global managers to fly in for courses without having to move. In addition, Students at UK EMBA schools get partial or full employer sponsorship, which lightens the cost burden while fostering employer commitment and leadership capital.</p>
                                    </ol>
                                 </div>
                                 <div class="details-list">
                                    <div class="list-item">
                                       <figure class="wp-block-table is-style-stripes">
                                          <table class="has-palette-color-5-background-color has-background">
                                             <tbody>
                                                <tr>
                                                   <td><strong>Executive MBA in the UK Universities</strong></td>
                                                   <td><strong>Duration</strong></td>
                                                   <td><strong>Executive MBA in the UK fees&nbsp;</strong></td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/university-of-london"><strong>University of London</strong></a></td>
                                                   <td>20 Months</td>
                                                   <td>90-95 Lakhs</td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/university-of-oxford"><strong>University of Oxford</strong></a></td>
                                                   <td>22 Months</td>
                                                   <td>85-90 Lakhs</td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/university-of-cambridge"><strong>University of Cambridge</strong></a></td>
                                                   <td>20 Months</td>
                                                   <td>85-90 Lakhs</td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/imperial-college-london"><strong>Imperial College London</strong></a></td>
                                                   <td>24 Months</td>
                                                   <td>70-75 Lakhs</td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/university-of-warwick"><strong>University of Warwick</strong></a></td>
                                                   <td>24 Months</td>
                                                   <td>65-70 Lakhs</td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/university-of-manchester"><strong>University of Manchester</strong></a></td>
                                                   <td>24 Months</td>
                                                   <td>60-65 Lakhs</td>
                                                </tr>
                                                <tr>
                                                   <td><a href="https://leapscholar.com/uk/university-details/cranfield-university"><strong>Cranfield University</strong></a></td>
                                                   <td>22 Months</td>
                                                   <td>55-60 Lakhs</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </figure>
                                    </div>
                                 </div>
                                 <div data-block="hook:70543" class="alignfull ct-hidden-sm ct-hidden-md">
                                    <article id="post-70543" class="post-70543">
                                       <div class="entry-content">
                                          <figure class="wp-block-image size-large ls-new-banner">
                                             <a href="https://leapscholar.com/webflow_progressive_form?utm_source=Counselling_SEO&amp;utm_medium=Blogs&amp;utm_term=LS-Banner&amp;utm_content=Central_Banner">
                                                <img decoding="async" width="100%"
                                                   src="https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-1024x430.webp" alt="Top Executive MBA Programs in the UK for Indian Professionals 2025" class="wp-image-70544 lazyloaded" sizes="(max-width: 1024px) 100vw, 1024px" srcset="https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-1024x430.webp 1024w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-300x126.webp 300w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-768x322.webp 768w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-1536x644.webp 1536w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-2048x859.webp 2048w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-150x63.webp 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="1024" height="430" src="https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-1024x430.webp" alt="Top Executive MBA Programs in the UK for Indian Professionals 2025" class="wp-image-70544" srcset="https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-1024x430.webp 1024w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-300x126.webp 300w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-768x322.webp 768w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-1536x644.webp 1536w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-2048x859.webp 2048w, https://leapscholar.com/blog/wp-content/uploads/2025/02/banner_desktop_3x-150x63.webp 150w" sizes="(max-width: 1024px) 100vw, 1024px"></noscript></a>
                                          </figure>
                                       </div>
                                    </article>
                                 </div>
                                 <div class="uk-card uk-card-default uk-card-body">
                                    <h3 class="fw-bold">Program Formats and Flexibility for Executive MBA in the UK</h3>
                                    <p>Around <strong> 70% of UK EMBA programs</strong> offer hybrid or part-time learning, making
                                       it easier for executives to balance work and study. Additionally,<strong> over 50% of EMBA </strong> students receive employer sponsorships or tuition reimbursement, making it a financially viable option for many professionals.</p>
                                 </div>
                                 <div data-block="hook:63495" class="alignfull">
                                    <article id="post-63495" class="post-63495">
                                       <div class="entry-content">
                                          <div class="explore-section">
                                             <h4>Explore all countries</h4>
                                             <div class="country-links">
                                                <a href="https://leapscholar.com/canada" class="country-link">
                                                   <div class="flag-circle">
                                                      <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Canada-CA.svg" alt="Canada Flag" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Canada-CA.svg" alt="Canada Flag"></noscript>
                                                   </div>
                                                   <span>Study in Canada</span>
                                                </a>
                                                <a href="https://leapscholar.com/usa" class="country-link">
                                                   <div class="flag-circle">
                                                      <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/USA.svg" alt="USA Flag" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/USA.svg" alt="USA Flag"></noscript>
                                                   </div>
                                                   <span>Study in USA</span>
                                                </a>
                                                <a href="https://leapscholar.com/uk" class="country-link">
                                                   <div class="flag-circle">
                                                      <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/UK.svg" alt="UK Flag" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/UK.svg" alt="UK Flag"></noscript>
                                                   </div>
                                                   <span>Study in UK</span>
                                                </a>
                                                <a href="https://leapscholar.com/australia" class="country-link">
                                                   <div class="flag-circle">
                                                      <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Australia.svg" alt="Australia Flag" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Australia.svg" alt="Australia Flag"></noscript>
                                                   </div>
                                                   <span>Study in Australia</span>
                                                </a>
                                                <a href="https://leapscholar.com/ireland" class="country-link">
                                                   <div class="flag-circle">
                                                      <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Ireland.svg" alt="Ireland Flag" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Ireland.svg" alt="Ireland Flag"></noscript>
                                                   </div>
                                                   <span>Study in Ireland</span>
                                                </a>
                                                <a href="https://leapscholar.com/germany" class="country-link">
                                                   <div class="flag-circle">
                                                      <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Germany.svg" alt="Germany Flag" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/08/Germany.svg" alt="Germany Flag"></noscript>
                                                   </div>
                                                   <span>Study in Germany</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </article>
                                 </div>
                              </div>
                              <div class="blog-desc prose mt-4">
                                 {!! $blog->text !!}
                              </div>
                              <div class="faq-div mt-3">
                                 <h3 class="fw-bold">Frequently Asked Questions
                                 </h3>
                                 <div id="rank-math-faq" class="rank-math-block">
                                    <ul class="rank-math-list ">
                                       <li id="faq-question-1668692930559" class="rank-math-list-item">
                                          <h5 class="rank-math-question "><strong><strong><strong>Q. Is an Executive MBA worth it in the UK?</strong></strong></strong></h5>
                                          <div class="rank-math-answer ">

                                             <p><strong>A.</strong> Yes, an EMBA in the UK is worth it for professionals aiming at leadership roles. Graduates often see a 25-35% salary increase, stronger networks, and C-level opportunities. Flexible formats allow career continuity while gaining a globally respected credential from top UK schools.</p>

                                          </div>
                                       </li>
                                       <li id="faq-question-1668692953749" class="rank-math-list-item">
                                          <h5 class="rank-math-question "><strong><strong>Q. How long is the Executive MBA in the UK?</strong></strong></h5>
                                          <div class="rank-math-answer ">

                                             <p><strong>A.</strong> Executive MBA programs in the UK typically last <strong>15 to 24 months</strong>. They are designed in modular, weekend, or part-time formats so professionals can continue full-time work while studying. Duration varies based on university structure and frequency of in-person sessions.</p>

                                          </div>
                                       </li>
                                       <li id="faq-question-1748404759133" class="rank-math-list-item">
                                          <h5 class="rank-math-question "><strong>Q. How much do Executive MBAs make in the UK?</strong></h5>
                                          <div class="rank-math-answer ">

                                             <p><strong>A.</strong> Executive MBA graduates in the UK earn between <strong>INR </strong>1 Cr - 1.6 Cr, depending on their industry and experience. Roles like CFO, Strategy Director, or Product Head offer lucrative packages, especially in finance, consulting, and tech sectors.</p>

                                          </div>
                                       </li>
                                       <li id="faq-question-1748404778945" class="rank-math-list-item">
                                          <h5 class="rank-math-question "><strong>Q. Which MBA is most demanding in the UK?</strong></h5>
                                          <div class="rank-math-answer ">

                                             <p><strong>A.</strong> London Business School, Oxford Saïd, and Cambridge Judge offer the most demanding MBAs in the UK. These are globally ranked, highly selective, and have rigorous academic loads. They’re preferred by candidates targeting global firms and top-tier consulting roles.</p>

                                          </div>
                                       </li>
                                       <li id="faq-question-1748404809510" class="rank-math-list-item">
                                          <h5 class="rank-math-question "><strong>Q. Is a 1-year MBA in the UK worth it?</strong></h5>
                                          <div class="rank-math-answer ">

                                             <p><strong>A.</strong> Yes, 1-year MBAs in the UK are intensive but valuable. They reduce opportunity cost and are globally recognised. Graduates from top schools like Oxford and Cambridge report strong job placements, salary jumps, and ROI within two years of graduation.</p>

                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="main-left-blog">
                                 <div class="ct-widget widget_block" id="block-186">
                                    <div data-block="hook:62666" class="alignfull">
                                       <article id="post-62666" class="post-62666">
                                          <div class="entry-content">
                                             <figure class="wp-block-image size-full"><img decoding="async" width="414" height="160" src="https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl.jpg" alt="counselling" class="wp-image-61148 lazyloaded" sizes="(max-width: 414px) 100vw, 414px" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl.jpg 414w, https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl-300x116.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl-150x58.jpg 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="414" height="160" src="https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl.jpg" alt="counselling" class="wp-image-61148" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl.jpg 414w, https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl-300x116.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/06/img-cta-girl-150x58.jpg 150w" sizes="(max-width: 414px) 100vw, 414px" /></noscript></figure>
                                             <h5 class="wp-block-heading has-text-align-center head-pop-18">Confused About MBA Specialisations?</h5>

                                             <p class="has-text-align-center">Book a free 30-minute consultation with our expert for a personalised course shortlist.</p>
                                             <div class="wp-block-buttons btn-style is-layout-flex wp-block-buttons-is-layout-flex">
                                                <div class="wp-block-button sidebar-counselling-cta"><a class="wp-block-button__link wp-element-button" href="https://leapscholar.com/webflow_progressive_form?utm_source=Counselling_SEO&amp;utm_medium=Blogs"><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong>Book a Free Slot</strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></a></div>
                                             </div>
                                             <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>

                                          </div>
                                       </article>
                                    </div>
                                 </div>
                                 <div class="ct-widget widget_block" id="block-188">
                                    <div class="wp-block-stackable-posts alignwide stk-block-posts stk-block stk-4aab084 is-style-list" data-v="2" data-block-id="4aab084">

                                       <div class="stk-inner-blocks stk-content-align stk-4aab084-column alignwide">
                                          <div class="stk-block-posts__items">
                                             <div class="stk-block-posts__item ">
                                                <div class="stk-container stk-4aab084-container stk--no-background stk--no-padding"><a href="https://leapscholar.com/blog/mbbs-without-neet-in-abroad/" class="stk-block-posts__image-link">
                                                      <figure class="stk-img-wrapper stk-image--shape-stretch"><img decoding="async" width="1920" height="1280" src="https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="mbbs without neet in abroad" sizes="(max-width: 1920px) 100vw, 1920px" srcset="https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1.jpg 1920w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-300x200.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-1024x683.jpg 1024w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-768x512.jpg 768w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-1536x1024.jpg 1536w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-2048x1366.jpg 2048w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="1920" height="1280" src="https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1.jpg" class="attachment-full size-full wp-post-image" alt="mbbs without neet in abroad" srcset="https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1.jpg 1920w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-300x200.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-1024x683.jpg 1024w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-768x512.jpg 768w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-1536x1024.jpg 1536w, https://leapscholar.com/blog/wp-content/uploads/2022/08/shutterstock_1718330014-min-scaled-1-2048x1366.jpg 2048w" sizes="(max-width: 1920px) 100vw, 1920px" /></noscript></figure>
                                                   </a>
                                                   <article class="stk-container-padding">
                                                      <h3 class="stk-block-posts__title"><a href="https://leapscholar.com/blog/mbbs-without-neet-in-abroad/">MBBS Without NEET in Abroad in 2026-2027: Complete Guide for Indian Students</a></h3>
                                                      <aside class="stk-block-posts__meta stk-subtitle"><time datetime="2024-11-21T12:50:18+00:00">November 21, 2024</time></aside>
                                                   </article>
                                                </div>
                                             </div>
                                             <div class="stk-block-posts__item mt-3">
                                                <div class="stk-container stk-4aab084-container stk--no-background stk--no-padding"><a href="https://leapscholar.com/blog/mbbs-in-philippines-for-indian-students-fees-and-colleges/" class="stk-block-posts__image-link">
                                                      <figure class="stk-img-wrapper stk-image--shape-stretch"><img decoding="async" width="512" height="288" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="MBBS in Philippines" sizes="(max-width: 512px) 100vw, 512px" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil.jpg 512w, https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil-300x169.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil-150x84.jpg 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="512" height="288" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil.jpg" class="attachment-full size-full wp-post-image" alt="MBBS in Philippines" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil.jpg 512w, https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil-300x169.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/07/mbbs-in-phil-150x84.jpg 150w" sizes="(max-width: 512px) 100vw, 512px" /></noscript></figure>
                                                   </a>
                                                   <article class="stk-container-padding">
                                                      <h3 class="stk-block-posts__title"><a href="https://leapscholar.com/blog/mbbs-in-philippines-for-indian-students-fees-and-colleges/">MBBS in Philippines for Indian Students: Fees, Colleges &amp; Requirement</a></h3>
                                                      <aside class="stk-block-posts__meta stk-subtitle"><time datetime="2024-07-03T10:53:20+00:00">July 3, 2024</time></aside>
                                                   </article>
                                                </div>
                                             </div>
                                             <div class="stk-block-posts__item mt-3">
                                                <div class="stk-container stk-4aab084-container stk--no-background stk--no-padding"><a href="https://leapscholar.com/blog/best-mbbs-colleges-in-the-world-for-indian-students/" class="stk-block-posts__image-link">
                                                      <figure class="stk-img-wrapper stk-image--shape-stretch"><img decoding="async" width="1200" height="800" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/medical.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="Best Medical Colleges in the World for 2025-26" sizes="(max-width: 1200px) 100vw, 1200px" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/07/medical.jpg 1200w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-300x200.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-1024x683.jpg 1024w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-768x512.jpg 768w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-150x100.jpg 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="1200" height="800" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/medical.jpg" class="attachment-full size-full wp-post-image" alt="Best Medical Colleges in the World for 2025-26" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/07/medical.jpg 1200w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-300x200.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-1024x683.jpg 1024w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-768x512.jpg 768w, https://leapscholar.com/blog/wp-content/uploads/2024/07/medical-150x100.jpg 150w" sizes="(max-width: 1200px) 100vw, 1200px" /></noscript></figure>
                                                   </a>
                                                   <article class="stk-container-padding">
                                                      <h3 class="stk-block-posts__title"><a href="https://leapscholar.com/blog/best-mbbs-colleges-in-the-world-for-indian-students/">Top MBBS &amp; Medical Colleges in the World for 2025 Rankings</a></h3>
                                                      <aside class="stk-block-posts__meta stk-subtitle"><time datetime="2024-07-03T05:19:10+00:00">July 3, 2024</time></aside>
                                                   </article>
                                                </div>
                                             </div>
                                             <div class="stk-block-posts__item mt-3">
                                                <div class="stk-container stk-4aab084-container stk--no-background stk--no-padding"><a href="https://leapscholar.com/blog/mbbs-in-germany-for-indian-students-fees-and-requirement/" class="stk-block-posts__image-link">
                                                      <figure class="stk-img-wrapper stk-image--shape-stretch"><img decoding="async" width="512" height="288" src="https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany.jpg" class="attachment-full size-full wp-post-image lazyloaded" alt="mbbs in germany" sizes="(max-width: 512px) 100vw, 512px" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany.jpg 512w, https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany-300x169.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany-150x84.jpg 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="512" height="288" src="https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany.jpg" class="attachment-full size-full wp-post-image" alt="mbbs in germany" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany.jpg 512w, https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany-300x169.jpg 300w, https://leapscholar.com/blog/wp-content/uploads/2024/06/mbbs-in-germany-150x84.jpg 150w" sizes="(max-width: 512px) 100vw, 512px" /></noscript></figure>
                                                   </a>
                                                   <article class="stk-container-padding">
                                                      <h3 class="stk-block-posts__title"><a href="https://leapscholar.com/blog/mbbs-in-germany-for-indian-students-fees-and-requirement/">MBBS in Germany for International Students: Universities, Fees, Requirements, Jobs</a></h3>
                                                      <aside class="stk-block-posts__meta stk-subtitle"><time datetime="2024-06-14T07:12:07+00:00">June 14, 2024</time></aside>
                                                   </article>
                                                </div>
                                             </div>
                                             <div class="stk-block-posts__item mt-3">
                                                <div class="stk-container stk-4aab084-container stk--no-background stk--no-padding"><a href="https://leapscholar.com/blog/mbbs-in-switzerland-for-indian-students-fees-and-requirement/" class="stk-block-posts__image-link">
                                                      <figure class="stk-img-wrapper stk-image--shape-stretch"><img decoding="async" width="550" height="309" src="https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222.png" class="attachment-full size-full wp-post-image lazyloaded" alt="Studying MBBS in Switzerland" sizes="(max-width: 550px) 100vw, 550px" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222.png 550w, https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222-300x169.png 300w, https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222-150x84.png 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="550" height="309" src="https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222.png" class="attachment-full size-full wp-post-image" alt="Studying MBBS in Switzerland" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222.png 550w, https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222-300x169.png 300w, https://leapscholar.com/blog/wp-content/uploads/2024/06/Screenshot-2024-06-14-102222-150x84.png 150w" sizes="(max-width: 550px) 100vw, 550px" /></noscript></figure>
                                                   </a>
                                                   <article class="stk-container-padding">
                                                      <h3 class="stk-block-posts__title"><a href="https://leapscholar.com/blog/mbbs-in-switzerland-for-indian-students-fees-and-requirement/">Studying MBBS in Switzerland: Requirements and Opportunities</a></h3>
                                                      <aside class="stk-block-posts__meta stk-subtitle"><time datetime="2024-06-14T05:24:43+00:00">June 14, 2024</time></aside>
                                                   </article>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="stk-inner-blocks"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="ct-sticky-widgets mt-5">
                                    <div class="ct-widget widget_block" id="block-193">
                                       <div data-block="hook:62668" class="alignfull ct-hidden-sm ct-hidden-md">
                                          <article id="post-62668" class="post-62668">
                                             <div class="entry-content">
                                                <figure class="wp-block-image size-full"><img decoding="async" width="1312" height="640" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1.png" alt="" class="wp-image-62545 lazyloaded" sizes="(max-width: 1312px) 100vw, 1312px" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1.png 1312w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-300x146.png 300w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-1024x500.png 1024w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-768x375.png 768w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-150x73.png 150w" data-ll-status="loaded"><noscript><img loading="lazy" decoding="async" width="1312" height="640" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1.png" alt="" class="wp-image-62545" srcset="https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1.png 1312w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-300x146.png 300w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-1024x500.png 1024w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-768x375.png 768w, https://leapscholar.com/blog/wp-content/uploads/2024/07/Download-Guide-Mobile-1-150x73.png 150w" sizes="(max-width: 1312px) 100vw, 1312px" /></noscript></figure>



                                                <h5 class="wp-block-heading has-text-align-center head-pop-18">Get the Free Complete MBA Program Guide</h5>



                                                <p class="has-text-align-center">Learn all about MBA programs, job opportunities &amp; best institutes to find the right fit for you.</p>



                                                <div class="wp-block-buttons btn-style is-layout-flex wp-block-buttons-is-layout-flex">
                                                   <div class="wp-block-button sidebar-counselling-cta"><a class="wp-block-button__link wp-element-button" href="https://leapscholar.com/webflow_progressive_form?utm_source=Counselling_SEO&amp;utm_medium=Blog"><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong><strong>Download Free MBA Program Guide</strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></strong></a></div>
                                                </div>



                                                <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>




                                             </div>
                                          </article>
                                       </div>
                                    </div>
                                    <div class="social-icons-holder">
                                       <h6 class="wp-block-heading has-text-align-center" style="margin-bottom:40px;">Love this Blog? Share the love <span><img decoding="async" src="https://leapscholar.com/blog/wp-content/themes/blocksy/images/heart.svg" alt="heart" class="star-icon lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/themes/blocksy/images/heart.svg" alt="heart" class="star-icon"></noscript></span></h6>
                                       <!-- <div class="social-icons">
                                          <button class="copy-post-url">
                                             <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/copy.svg" alt="copy link" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/copy.svg" alt="copy link"></noscript>
                                          </button>
                                          <a href="https://twitter.com/leapscholar">
                                             <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/twitter.svg" alt="twitter leap" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/twitter.svg" alt="twitter leap"></noscript>
                                          </a>
                                          <a href="https://www.facebook.com/leapscholar">
                                             <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/fb.svg" alt="fb leap" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/fb.svg" alt="fb leap"></noscript>
                                          </a>
                                          <a href="https://www.linkedin.com/company/leap-global-education/">
                                             <img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/linkedin.svg" alt="linkedin leap" class="lazyloaded" data-ll-status="loaded"><noscript><img decoding="async" src="https://leapscholar.com/blog/wp-content/uploads/2024/07/linkedin.svg" alt="linkedin leap"></noscript>
                                          </a>
                                       </div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="share-post mt-3">
                           <h5 class="fw-bold mb-3">Share this post:</h5>
                           <div class="d-flex gap-2 flex-wrap">
                              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                 target="_blank" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width:45px; height:45px;">
                                 <i class="fa-brands fa-facebook-f"></i>
                              </a>
                              <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                                 target="_blank" class="btn btn-outline-info rounded-circle d-flex align-items-center justify-content-center" style="width:45px; height:45px;">
                                 <i class="fa-brands fa-twitter "></i>
                              </a>

                              <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                 target="_blank"
                                 class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
                                 style="width:45px; height:45px;">
                                 <i class="fa-brands fa-linkedin-in"></i>
                              </a>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</section>



<script>
   document.addEventListener('DOMContentLoaded', function() {
      // Reading Progress Bar
      const progressBar = document.querySelector('.reading-progress-bar');
      const content = document.querySelector('.blog-desc');

      window.addEventListener('scroll', () => {
         if (content) {
            const scrolled = window.scrollY;
            const contentHeight = content.offsetHeight;
            const windowHeight = window.innerHeight;
            const progress = (scrolled / (contentHeight - windowHeight)) * 100;
            progressBar.style.width = `${Math.min(100, progress)}%`;
         }
      });

      // Back to Top Button
      const backToTop = document.getElementById('backToTop');

      window.addEventListener('scroll', () => {
         if (window.scrollY > 300) {
            backToTop.classList.add('visible');
         } else {
            backToTop.classList.remove('visible');
         }
      });

      backToTop.addEventListener('click', () => {
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
         });
      });

      // Lazy Loading Images
      const images = document.querySelectorAll('.lazy-load');

      const imageObserver = new IntersectionObserver((entries, observer) => {
         entries.forEach(entry => {
            if (entry.isIntersecting) {
               const img = entry.target;
               img.classList.add('loaded');
               observer.unobserve(img);
            }
         });
      });

      images.forEach(img => imageObserver.observe(img));

      // Smooth Scroll for Anchor Links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
         anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
               behavior: 'smooth'
            });
         });
      });
   });
</script>
@endsection