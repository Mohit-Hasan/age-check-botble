<style>
    
    body.age-check-no-scroll {
        overflow: hidden;
        height: 100vh;
    }

    #age-check-popup {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: {{ theme_option('age_check_overlay_color', 'rgba(0,0,0,0.6)') }};
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #age-check-popup .popup-content {
        background-color: {{ theme_option('age_check_background_color', '#fff') }};
        color: {{ theme_option('age_check_text_color', '#333') }};
        padding: 30px;
        border-radius: 12px;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        text-align: center;
    }

    #age-check-popup button {
        margin: 10px 10px 0 0;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
    }

    #age-check-popup button[name="confirm"][value="yes"] {
        background-color: #28a745;
        color: white;
    }

    #age-check-popup button[name="confirm"][value="no"] {
        background-color: #dc3545;
        color: white;
    }
    
    #age-check-popup button[name="confirm"][value="yes"]:hover {
        background-color:rgb(19, 126, 42);
    }
    #age-check-popup button[name="confirm"][value="no"]:hover {
        background-color:rgb(177, 12, 12);
    }
    

</style>

<div id="age-check-popup">
    <div class="popup-content">
        <h3>{{ theme_option('age_check_msg', 'Are you 18 years old or over?') }}</h3>
        <form method="POST" action="{{ route('age.check.submit') }}">
            @csrf
            <button name="confirm" value="yes">{{ theme_option('age_check_button_yes_text', 'Yes, I am 18+') }}</button>
            <button name="confirm" value="no">{{ theme_option('age_check_button_no_text', 'No') }}</button>
        </form>
    </div>
</div>

<style>
  html.age-check-no-scroll, 
  body.age-check-no-scroll {
    overflow: hidden !important;
    height: 100% !important;
    position: fixed !important;
    width: 100% !important;
  }
</style>

<script>
  (function() {
    const scrollY = window.scrollY || window.pageYOffset;
    document.documentElement.classList.add('age-check-no-scroll');
    document.body.classList.add('age-check-no-scroll');
    document.documentElement.style.top = `-${scrollY}px`;
    document.body.style.top = `-${scrollY}px`;
  })();
</script>
