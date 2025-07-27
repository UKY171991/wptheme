<?php
/**
 * Pricing Fallback Template Part
 * Default pricing plans when none are created in admin
 */?>
<div class="pricing-card">
    <div class="plan-header">
        <h3 class="plan-name"><?php esc_html_e('Starter', 'blueprint-folder');?></h3>
        <div class="plan-price">
            <span class="price">
                <span class="currency">$</span>
                <span class="amount">99</span>
                <span class="period">/month</span>
            </span>
        </div>
        <p class="plan-description"><?php esc_html_e('Perfect for small businesses getting started', 'blueprint-folder');?></p>
    </div>
    <div class="plan-features">
        <ul class="features-list">
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Basic consultation', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Email support', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Monthly reports', 'blueprint-folder');?>
            </li>
        </ul>
    </div>
    <div class="plan-footer">
        <a href="<?php echo esc_url(home_url('/contact'));?>" class="btn btn-plan">
            <?php esc_html_e('Get Started', 'blueprint-folder');?>
            <i class="fas fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
<div class="pricing-card popular featured">
    <div class="popular-badge">
        <?php esc_html_e('Most Popular', 'blueprint-folder');?>
    </div>
    <div class="plan-header">
        <h3 class="plan-name"><?php esc_html_e('Professional', 'blueprint-folder');?></h3>
        <div class="plan-price">
            <span class="price">
                <span class="currency">$</span>
                <span class="amount">199</span>
                <span class="period">/month</span>
            </span>
        </div>
        <p class="plan-description"><?php esc_html_e('Comprehensive solution for growing businesses', 'blueprint-folder');?></p>
    </div>
    <div class="plan-features">
        <ul class="features-list">
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Everything in Starter', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Priority support', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Weekly reports', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Advanced analytics', 'blueprint-folder');?>
            </li>
        </ul>
    </div>
    <div class="plan-footer">
        <a href="<?php echo esc_url(home_url('/contact'));?>" class="btn btn-plan">
            <?php esc_html_e('Get Started', 'blueprint-folder');?>
            <i class="fas fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
<div class="pricing-card">
    <div class="plan-header">
        <h3 class="plan-name"><?php esc_html_e('Enterprise', 'blueprint-folder');?></h3>
        <div class="plan-price">
            <span class="price">
                <span class="currency">$</span>
                <span class="amount">399</span>
                <span class="period">/month</span>
            </span>
        </div>
        <p class="plan-description"><?php esc_html_e('Custom solutions for large organizations', 'blueprint-folder');?></p>
    </div>
    <div class="plan-features">
        <ul class="features-list">
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Everything in Professional', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Dedicated account manager', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('24/7 phone support', 'blueprint-folder');?>
            </li>
            <li class="feature-item">
                <i class="fas fa-check" aria-hidden="true"></i>
                <?php esc_html_e('Custom integrations', 'blueprint-folder');?>
            </li>
        </ul>
    </div>
    <div class="plan-footer">
        <a href="<?php echo esc_url(home_url('/contact'));?>" class="btn btn-plan">
            <?php esc_html_e('Contact Sales', 'blueprint-folder');?>
            <i class="fas fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
