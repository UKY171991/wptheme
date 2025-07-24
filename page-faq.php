<?php
/*
Template Name: FAQ Page
*/
get_header(); ?>

<div class="faq-page">
    <!-- Hero Section -->
    <section class="faq-hero" style="background: linear-gradient(rgba(11, 17, 51, 0.8), rgba(11, 17, 51, 0.9)), url('data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1200 400\' fill=\'%23ff5f00\'><circle cx=\'200\' cy=\'100\' r=\'20\' opacity=\'0.2\'/><circle cx=\'400\' cy=\'200\' r=\'15\' opacity=\'0.15\'/><circle cx=\'800\' cy=\'150\' r=\'25\' opacity=\'0.1\'/><circle cx=\'1000\' cy=\'250\' r=\'18\' opacity=\'0.25\'/></svg>'); padding: 4rem 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem; font-weight: 700;">Frequently Asked Questions</h1>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto 2rem; opacity: 0.9;">Find answers to common questions about our services, booking process, and more</p>
        </div>
    </section>

    <!-- FAQ Search -->
    <section class="faq-search" style="padding: 3rem 0; background: white;">
        <div class="container">
            <div class="search-box" style="max-width: 700px; margin: 0 auto; position: relative;">
                <input type="text" id="faqSearch" placeholder="Search for questions..." style="width: 100%; padding: 1.2rem 1.5rem 1.2rem 3rem; border: 1px solid #e0e0e0; border-radius: 50px; font-size: 1.1rem; box-shadow: 0 5px 20px rgba(0,0,0,0.1); outline: none; transition: all 0.3s ease;">
                <i class="fas fa-search" style="position: absolute; left: 1.2rem; top: 50%; transform: translateY(-50%); color: #999;"></i>
            </div>
        </div>
    </section>

    <!-- FAQ Categories and Questions -->
    <section class="faq-content" style="padding: 3rem 0 5rem; background: #f8f9fa;">
        <div class="container">
            <div class="faq-categories" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; margin-bottom: 3rem;">
                <button class="faq-category active" data-category="all" style="padding: 0.75rem 1.5rem; background: #ff5f00; color: white; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">All Questions</button>
                <button class="faq-category" data-category="services" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Services</button>
                <button class="faq-category" data-category="booking" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Booking</button>
                <button class="faq-category" data-category="pricing" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Pricing</button>
                <button class="faq-category" data-category="payment" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Payment</button>
                <button class="faq-category" data-category="policy" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Policies</button>
            </div>
            
            <div class="faq-items" style="max-width: 900px; margin: 0 auto;">
                <!-- Services FAQs -->
                <div class="faq-group" data-category="services">
                    <h2 style="margin-bottom: 2rem; color: #333; font-size: 1.8rem; padding-bottom: 0.5rem; border-bottom: 2px solid #ff5f00;">About Our Services</h2>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">What services do you offer?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>We offer a comprehensive range of home and lifestyle services including:</p>
                                <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>Home cleaning (regular, deep, move-in/out)</li>
                                    <li>Handyman and maintenance services</li>
                                    <li>Lawn care and gardening</li>
                                    <li>Pet care services</li>
                                    <li>Errands and personal assistance</li>
                                    <li>And many more specialized services</li>
                                </ul>
                                <p>You can view our full list of services on our <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" style="color: #ff5f00; font-weight: 600;">Services page</a>.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Do you bring your own supplies and equipment?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Yes, for most services, our professionals bring all necessary supplies, equipment, and tools needed to complete the job. For cleaning services, we use professional-grade, eco-friendly cleaning products unless you specify that you prefer us to use your supplies.</p>
                                <p>For specialized projects, we'll discuss any specific requirements during the booking process.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Are your staff professional and experienced?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Absolutely. All our team members undergo thorough background checks, professional training, and are fully insured. Many of our staff have years of experience in their respective fields, and we pride ourselves on maintaining high standards of professionalism and service quality.</p>
                                <p>Our professionals are selected not only for their skills but also for their commitment to customer service and attention to detail.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Booking FAQs -->
                <div class="faq-group" data-category="booking">
                    <h2 style="margin-bottom: 2rem; color: #333; font-size: 1.8rem; padding-bottom: 0.5rem; border-bottom: 2px solid #ff5f00;">Booking Process</h2>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">How do I book a service?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Booking a service is simple:</p>
                                <ol style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>Visit our <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" style="color: #ff5f00; font-weight: 600;">Contact page</a> or call us directly at <?php echo esc_html(get_theme_mod('contact_phone', '(800) 555-1234')); ?></li>
                                    <li>Provide details about the service you need, including date, time, and location</li>
                                    <li>Receive a quote based on your requirements</li>
                                    <li>Confirm your booking and provide any additional information needed</li>
                                    <li>You'll receive a confirmation email with all the details</li>
                                </ol>
                                <p>You can also request a callback by filling out our quick form, and one of our representatives will contact you to help schedule your service.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">How far in advance should I book?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>We recommend booking at least 48-72 hours in advance for most regular services to ensure availability. For specialized or large projects, booking 1-2 weeks ahead is ideal.</p>
                                <p>However, we understand that sometimes you need service quickly. We do our best to accommodate last-minute requests when possible, so don't hesitate to contact us even if you need same-day service.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Can I reschedule or cancel my booking?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Yes, you can reschedule or cancel your booking. We request that you notify us at least 24 hours in advance to avoid any cancellation fees. For rescheduling, we'll do our best to accommodate your preferred new date and time.</p>
                                <p>To reschedule or cancel, please call our customer service team at <?php echo esc_html(get_theme_mod('contact_phone', '(800) 555-1234')); ?> or email us at <?php echo esc_html(get_theme_mod('contact_email', 'info@yourservices.com')); ?>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pricing FAQs -->
                <div class="faq-group" data-category="pricing">
                    <h2 style="margin-bottom: 2rem; color: #333; font-size: 1.8rem; padding-bottom: 0.5rem; border-bottom: 2px solid #ff5f00;">Pricing Information</h2>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">How much do your services cost?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Our service pricing varies depending on the specific service, the size of the project, and any special requirements. We offer both flat-rate pricing for standard services and customized quotes for more complex jobs.</p>
                                <p>You can find general pricing information on our <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" style="color: #ff5f00; font-weight: 600;">Services page</a>, or contact us for a personalized quote. We pride ourselves on transparent pricing with no hidden fees.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Do you offer any discounts or package deals?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Yes, we offer several ways to save:</p>
                                <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>Recurring service discounts (e.g., weekly or bi-weekly cleaning)</li>
                                    <li>Seasonal promotions throughout the year</li>
                                    <li>Bundle discounts when booking multiple services</li>
                                    <li>Referral rewards for existing customers</li>
                                    <li>New customer specials</li>
                                </ul>
                                <p>Ask our customer service team about current promotions when you book your service.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">What if the job takes longer than expected?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>For flat-rate services, you won't be charged extra if the job takes longer than estimated. We're committed to completing the work as specified in your service agreement, regardless of how long it takes.</p>
                                <p>For hourly services, we provide time estimates before starting. If we anticipate exceeding the estimated time, our team will notify you and get your approval before continuing with additional hours.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payment FAQs -->
                <div class="faq-group" data-category="payment">
                    <h2 style="margin-bottom: 2rem; color: #333; font-size: 1.8rem; padding-bottom: 0.5rem; border-bottom: 2px solid #ff5f00;">Payment Information</h2>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">What payment methods do you accept?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>We accept multiple payment methods for your convenience:</p>
                                <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>Credit/debit cards (Visa, Mastercard, American Express, Discover)</li>
                                    <li>Online payment through our secure portal</li>
                                    <li>Cash</li>
                                    <li>Checks (for established customers)</li>
                                    <li>Digital payment services (PayPal, Venmo, etc.)</li>
                                </ul>
                                <p>For recurring services, we offer the option to set up automatic payments.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">When am I required to pay?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Our payment terms vary by service type:</p>
                                <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>For standard services (cleaning, lawn care, etc.), payment is due upon completion of the service</li>
                                    <li>For larger projects, we may require a deposit before starting (typically 25-50% of the total)</li>
                                    <li>For recurring services, payment is typically processed after each service or on a monthly billing cycle</li>
                                </ul>
                                <p>We'll always clarify the payment schedule before beginning any work.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Do you provide invoices or receipts?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Yes, we provide detailed invoices and receipts for all services. You'll receive these documents electronically via email after service completion or payment processing.</p>
                                <p>If you need a paper copy or have specific invoicing requirements (such as for business or tax purposes), please let us know, and we'll be happy to accommodate your needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Policy FAQs -->
                <div class="faq-group" data-category="policy">
                    <h2 style="margin-bottom: 2rem; color: #333; font-size: 1.8rem; padding-bottom: 0.5rem; border-bottom: 2px solid #ff5f00;">Our Policies</h2>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Do you have a satisfaction guarantee?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Yes, we stand behind our work with a 100% satisfaction guarantee. If you're not completely satisfied with our service, please let us know within 24 hours, and we'll return to address any issues at no additional cost.</p>
                                <p>Our goal is your complete satisfaction, and we're committed to making things right if any aspect of our service doesn't meet your expectations.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">Are you insured and bonded?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>Yes, we are fully insured and bonded. This includes:</p>
                                <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>General liability insurance</li>
                                    <li>Workers' compensation insurance</li>
                                    <li>Bonding to protect against loss or damage</li>
                                </ul>
                                <p>Our insurance coverage protects both our team members and your property. If you require proof of insurance for any reason, we're happy to provide documentation upon request.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-item" style="margin-bottom: 1.5rem; background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease;">
                        <div class="faq-question" style="padding: 1.5rem; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.2rem; color: #333;">How do you handle privacy and security?</h3>
                            <span class="toggle-icon" style="color: #ff5f00; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease;">
                            <div style="padding-bottom: 1.5rem; border-top: 1px solid #f0f0f0; padding-top: 1.5rem; color: #666; line-height: 1.7;">
                                <p>We take privacy and security very seriously:</p>
                                <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                    <li>All team members undergo thorough background checks</li>
                                    <li>We have strict confidentiality policies regarding client information</li>
                                    <li>We respect your home and personal space at all times</li>
                                    <li>Key handling follows secure protocols if keys are provided</li>
                                    <li>Payment information is processed through secure, encrypted systems</li>
                                </ul>
                                <p>You can review our full privacy policy on our website or request a copy from our customer service team.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Not finding answer section -->
            <div class="not-finding-answer" style="margin-top: 4rem; text-align: center; background: white; padding: 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: #333;">Still Have Questions?</h3>
                <p style="color: #666; max-width: 700px; margin: 0 auto 2rem; font-size: 1.1rem;">If you couldn't find the answer you were looking for, our friendly customer service team is ready to help.</p>
                <div class="contact-options" style="display: flex; flex-wrap: wrap; gap: 1.5rem; justify-content: center;">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="contact-btn" style="display: flex; align-items: center; background: #ff5f00; color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i> Contact Us
                    </a>
                    <a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_theme_mod('contact_phone', '(800) 555-1234')); ?>" class="contact-btn" style="display: flex; align-items: center; background: #0b1133; color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        <i class="fas fa-phone-alt" style="margin-right: 0.5rem;"></i> <?php echo esc_html(get_theme_mod('contact_phone', '(800) 555-1234')); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.faq-category:hover,
.faq-category.active {
    background: #ff5f00;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.2);
}

.faq-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.faq-question:hover h3 {
    color: #ff5f00;
}

.faq-answer.active {
    max-height: 1000px;
    padding: 0 1.5rem;
}

.toggle-icon.active {
    transform: rotate(45deg);
}

#faqSearch:focus {
    border-color: #ff5f00;
    box-shadow: 0 5px 20px rgba(255, 95, 0, 0.15);
}

.contact-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
    .faq-hero h1 {
        font-size: 2.5rem;
    }
    
    .faq-categories {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .faq-category {
        width: 100%;
    }
    
    .contact-options {
        flex-direction: column;
    }
    
    .contact-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Category Filter
    const faqCategories = document.querySelectorAll('.faq-category');
    const faqGroups = document.querySelectorAll('.faq-group');
    
    faqCategories.forEach(category => {
        category.addEventListener('click', function() {
            const selectedCategory = this.getAttribute('data-category');
            
            // Update active button
            faqCategories.forEach(cat => cat.classList.remove('active'));
            this.classList.add('active');
            
            // Show/hide FAQ groups based on category
            if (selectedCategory === 'all') {
                faqGroups.forEach(group => group.style.display = 'block');
            } else {
                faqGroups.forEach(group => {
                    if (group.getAttribute('data-category') === selectedCategory) {
                        group.style.display = 'block';
                    } else {
                        group.style.display = 'none';
                    }
                });
            }
        });
    });
    
    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const toggleIcon = this.querySelector('.toggle-icon');
            
            // Toggle active class
            if (answer.classList.contains('active')) {
                answer.classList.remove('active');
                toggleIcon.classList.remove('active');
            } else {
                answer.classList.add('active');
                toggleIcon.classList.add('active');
            }
        });
    });
    
    // FAQ Search
    const faqSearch = document.getElementById('faqSearch');
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqSearch.addEventListener('input', function() {
        const searchQuery = this.value.toLowerCase();
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer div').textContent.toLowerCase();
            
            if (question.includes(searchQuery) || answer.includes(searchQuery)) {
                item.style.display = 'block';
                
                // If search has results, show the parent group
                const parentGroup = item.closest('.faq-group');
                parentGroup.style.display = 'block';
                
                // Expand items that match search
                if (searchQuery.length > 2) {
                    const answerElement = item.querySelector('.faq-answer');
                    const toggleIcon = item.querySelector('.toggle-icon');
                    
                    answerElement.classList.add('active');
                    toggleIcon.classList.add('active');
                }
            } else {
                item.style.display = 'none';
            }
        });
        
        // If a group has no visible items, hide it
        faqGroups.forEach(group => {
            const visibleItems = group.querySelectorAll('.faq-item[style="display: block;"]');
            if (visibleItems.length === 0 && searchQuery.length > 0) {
                group.style.display = 'none';
            }
        });
        
        // If search is cleared, reset to all or current category
        if (searchQuery === '') {
            const activeCategory = document.querySelector('.faq-category.active').getAttribute('data-category');
            
            if (activeCategory === 'all') {
                faqGroups.forEach(group => group.style.display = 'block');
            } else {
                faqGroups.forEach(group => {
                    if (group.getAttribute('data-category') === activeCategory) {
                        group.style.display = 'block';
                    } else {
                        group.style.display = 'none';
                    }
                });
            }
            
            // Collapse all items
            faqItems.forEach(item => {
                item.style.display = 'block';
                const answerElement = item.querySelector('.faq-answer');
                const toggleIcon = item.querySelector('.toggle-icon');
                
                answerElement.classList.remove('active');
                toggleIcon.classList.remove('active');
            });
        }
    });
});
</script>

<?php get_footer(); ?>
