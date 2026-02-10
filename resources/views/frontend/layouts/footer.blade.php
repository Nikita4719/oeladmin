<!-- jQuery (load only once) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>
<!-- AOS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" crossorigin="anonymous"></script>

<!-- Slick (load only once) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- CounterUp -->
<script>
let counter = document.querySelectorAll(".counter")
let arr = Array.from(counter)

arr.map((item) => {
    let count = 0
    function CounterUp() {
        count++
        item.innerHTML = count
        if (count == item.dataset.number) {
            clearInterval(stop);
        }
    }
    let stop = setInterval(CounterUp, 100 / item.dataset.speed);
});
</script>

<!-- Read More Toggle -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.read-more-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            let parentDiv = btn.closest('.confusion');
            let shortContent = parentDiv.querySelector('.short-content');
            let fullContent = parentDiv.querySelector('.full-content');

            if (fullContent.style.display === 'none') {
                fullContent.style.display = 'block';
                shortContent.style.display = 'none';
                btn.textContent = 'Read Less';
            } else {
                fullContent.style.display = 'none';
                shortContent.style.display = 'block';
                btn.textContent = 'Read More';
            }
        });
    });
});
</script>

<!-- Slider pause on video hover -->
<script>
const slider = document.getElementById("slider");
if (slider) {
    const videos = slider.querySelectorAll("video");
    videos.forEach(video => {
        video.addEventListener("mouseenter", () => {
            slider.style.animationPlayState = "paused";
        });
        video.addEventListener("mouseleave", () => {
            slider.style.animationPlayState = "running";
        });
    });
}
</script>

<!-- Testimonials -->
<script>
let testimonials = [];
let activeIndex = 0;

const imageContainer = document.getElementById("image-container");
const nameElement = document.getElementById("name");
const designationElement = document.getElementById("designation");
const quoteElement = document.getElementById("quote");
const locationElement = document.getElementById("location");
const universityElement = document.getElementById("university");
const reviewlinkElement = document.getElementById("review_link");

const prevButton = document.getElementById("prev-button");
const nextButton = document.getElementById("next-button");

function calculateGap(width) {
    const minWidth = 1024;
    const maxWidth = 1456;
    const minGap = 60;
    const maxGap = 86;
    if (width <= minWidth) return minGap;
    if (width >= maxWidth) return Math.max(minGap, maxGap + 0.06018 * (width - maxWidth));
    return minGap + (maxGap - minGap) * ((width - minWidth) / (maxWidth - minWidth));
}

function updateTestimonial(direction = 0) {
    if (testimonials.length === 0) return;
    activeIndex = (activeIndex + direction + testimonials.length) % testimonials.length;
    const containerWidth = imageContainer.offsetWidth;
    const gap = calculateGap(containerWidth);
    const maxStickUp = gap * 0.8;

    testimonials.forEach((testimonial, index) => {
        let img = imageContainer.querySelector(`[data-index="${index}"]`);
        if (!img) {
            img = document.createElement("img");
            img.src = testimonial.src;
            img.alt = testimonial.name;
            img.classList.add("testimonial-image");
            img.dataset.index = index;
            imageContainer.appendChild(img);
        }

        const offset = (index - activeIndex + testimonials.length) % testimonials.length;
        const zIndex = testimonials.length - Math.abs(offset);
        const opacity = index === activeIndex ? 1 : 0.5;
        const scale = index === activeIndex ? 1 : 0.85;

        let translateX, translateY, rotateY;
        if (offset === 0) {
            translateX = "0%";
            translateY = "0%";
            rotateY = "0deg";
        } else if (offset === 1 || offset === -2) {
            translateX = "20%";
            translateY = `-${(maxStickUp / img.offsetHeight) * 100}%`;
            rotateY = "-15deg";
        } else {
            translateX = "-20%";
            translateY = `-${(maxStickUp / img.offsetHeight) * 100}%`;
            rotateY = "15deg";
        }

        img.style.zIndex = zIndex;
        img.style.opacity = opacity;
        img.style.transform = `translate(${translateX}, ${translateY}) scale(${scale}) rotateY(${rotateY})`;
    });

    const current = testimonials[activeIndex];
    nameElement.textContent = current.name;
    reviewlinkElement.href = current.review_link;
    designationElement.textContent = current.university;
    locationElement.textContent = current.location || '';

    const quoteWords = current.quote.split(" ").map(word => `<span class="word">${word}</span>`).join(" ");
    quoteElement.innerHTML = quoteWords;

    animateWords();
}

function animateWords() {
    const words = quoteElement.querySelectorAll(".word");
    words.forEach((word, index) => {
        word.style.opacity = "0";
        word.style.transform = "translateY(10px)";
        word.style.filter = "blur(10px)";
        setTimeout(() => {
            word.style.transition = "opacity 0.2s, transform 0.2s, filter 0.2s";
            word.style.opacity = "1";
            word.style.transform = "translateY(0)";
            word.style.filter = "blur(0)";
        }, index * 20);
    });
}

function handleNext() { updateTestimonial(1); }
function handlePrev() { updateTestimonial(-1); }

if (prevButton && nextButton) {
    prevButton.addEventListener("click", handlePrev);
    nextButton.addEventListener("click", handleNext);
}

window.addEventListener("resize", () => updateTestimonial(0));

fetch('{{url("/get-testimonials")}}')
    .then(response => response.json())
    .then(data => {
        testimonials = data.map(item => {
            const plainText = item.testimonial_desc.replace(/<[^>]*>/g, '');
            const shortQuote = plainText.length > 200 ? plainText.substring(0, 200) + '...' : plainText;
            return {
                quote: shortQuote,
                name: item.name,
                designation: item.designation,
                location: item.location,
                university: item.university,
                review_link: item.review_link,
                src: 'https://www.overseaseducationlane.com/public/imagesapi/' + item.profile_picture
            };
        });
        updateTestimonial(0);
    })
    .catch(error => console.error('Error fetching testimonials:', error));

let autoplayInterval = setInterval(handleNext, 5000);
[prevButton, nextButton].forEach(button => {
    button.addEventListener("click", () => clearInterval(autoplayInterval));
});
</script>

<!-- Swiper Init -->

<script>
document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".swiper", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});
</script>

<!-- YouTube API -->
<script>
let players = [];
function onYouTubeIframeAPIReady() {
    document.querySelectorAll("iframe[id^='player-']").forEach((iframe, index) => {
        let player = new YT.Player(iframe.id, {
            events: {
                'onStateChange': (event) => {
                    if (event.data === YT.PlayerState.PLAYING) stopOthers(index);
                }
            }
        });
        players.push(player);
    });
}
function stopOthers(currentIndex) {
    players.forEach((player, index) => {
        if (index !== currentIndex) player.pauseVideo();
    });
}
(function() {
    let tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    document.head.appendChild(tag);
})();
</script>

<!-- Responsive Image Map -->
<script>
$(document).ready(function () {
    const image = document.getElementById("tree-responsive-image");
    const map = document.getElementById("image-map");
    if (!image || !map) return;

    const originalWidth = 575, originalHeight = 570;
    function scaleCoords() {
        const scaleX = image.offsetWidth / originalWidth;
        const scaleY = image.offsetHeight / originalHeight;
        [...map.getElementsByTagName("area")].forEach(area => {
            const coords = area.dataset.originalCoords.split(",").map(Number);
            const scaled = coords.map((v, i) => i % 2 === 0 ? v * scaleX : v * scaleY);
            area.coords = scaled.join(",");
        });
    }
    [...map.getElementsByTagName("area")].forEach(area => {
        if (!area.dataset.originalCoords) area.dataset.originalCoords = area.coords;
    });
    window.addEventListener("resize", scaleCoords);
    scaleCoords();
});
</script>

<!-- AOS Init -->
<script>AOS.init();</script>

<!-- OTP + Menu -->
<script>
$(document).ready(function () {
    const menuBtn = document.getElementById("menu_btn");
    const navLinks = document.getElementById("nav_links");
    if (menuBtn && navLinks) {
        const menuBtnIcon = menuBtn.querySelector("i");
        menuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("open");
            const isOpen = navLinks.classList.contains("open");
            menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
        });
    }

    $('#verify_otp').click(function (e) {
        e.preventDefault();
        $('.error-phone').html('');
        let mobile_number = $('#mobile_number').val();
        if (!mobile_number || mobile_number.length != 10 || !/^\d+$/.test(mobile_number)) {
            alert('Please enter valid mobile number');
            return false;
        }
        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $.ajax({
            url: "{{ route('send-otp') }}",
            type: 'POST',
            data: { phone_number: mobile_number, _token: '{{ csrf_token() }}' },
            success: function (data) {
                spinner.classList.add('d-none');
                if (data.success) {
                    $('.otp-sent').html(data.message);
                    $('.otp-verify').show();
                } else {
                    $('.error-phone').html(data.message);
                }
            },
            error: function (xhr) {
                spinner.classList.add('d-none');
                if (xhr.responseJSON.errors.phone_number) {
                    $('.error-phone').html(xhr.responseJSON.errors.phone_number[0]);
                }
            }
        });
    });

    $('.booking_enquiry').on('click', function (e) {
        e.preventDefault();
        let mobile_number = $('#mobile_number').val();
        let full_name = $('#full_name').val();
        let email = $('#email_name').val();
        let otp = $('#otp').val();

        if (!mobile_number || mobile_number.length != 10 || !/^\d+$/.test(mobile_number)) {
            alert('Please enter valid mobile number');
            return false;
        }
        if (!full_name) {
            alert('Please enter your full name');
            return false;
        }
        if (!otp) {
            alert('Please enter otp');
            return false;
        }

        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $.ajax({
            url: "{{ route('verify-otp') }}",
            type: 'POST',
            data: { phone_number: mobile_number, full_name: full_name, email: email, otp: otp, _token: '{{ csrf_token() }}' },
            success: function (data) {
                spinner.classList.add('d-none');
                if (data.success) {
                    window.location.href = "{{ url('check-eligibility') }}";
                } else {
                    $('.otp-error').html(data.message);
                    $('#exampleModal').hide();
                }
            },
            error: function (xhr) {
                spinner.classList.add('d-none');
                if (xhr.status == 422) {
                    $('.otp-error').html('Invalid OTP.');
                }
            }
        });
    });

    $('.myspan').on('click', function () {
        $('#exampleModal').hide();
    });
});
</script>
