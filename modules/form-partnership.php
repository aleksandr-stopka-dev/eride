<form id="partnership-contact-form">
    <div class="partnership__form-body">
        <input type="text" name="name" placeholder="Full name" required>
        
        <input type="text" name="company-name" placeholder="Company / Fund name" required>

        <input type="text" name="position-title" placeholder="Position title" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="tel" name="phone" placeholder="Phone" required>

        <select name="investment-focus-area">
            <option value="Investment focus area" disabled selected hidden>Investment focus area</option>
            <option value="Venture Capital">Venture Capital</option>
            <option value="Private Equity">Private Equity</option>
            <option value="Strategic Partner">Strategic Partner</option>
            <option value="Angel Investor">Angel Investor</option>
            <option value="Institutional">Institutional</option>
            <option value="Other">Other</option>
        </select>

        <select name="preferred-engagement">
            <option value="Preferred engagement" disabled selected hidden>Preferred engagement</option>
            <option value="Request Pitch Deck">Request Pitch Deck</option>
            <option value="Request Financial Overview">Request Financial Overview</option>
            <option value="Schedule Executive Call">Schedule Executive Call</option>
            <option value="Strategic Partnership Call">Strategic Partnership Call</option>
        </select>

        <textarea name="message" placeholder="Tell us about your enquiry"></textarea>
    </div>

    <div class="partnership__form-footer">
        <button type="submit" class="btn">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="black" />
            </svg>

            Submit enquiry
        </button>

        <div class="partnership__form-privacy">
            <p>
                All partnership communications are treated confidentially. Submission does not constitute an offer or solicitation of securities.
            </p>
        </div>
    </div>
</form>