<?php include_once 'layouts/navigation.php' ?>

<?php $value_rating = 3.5; ?>

<?php echo "ceil: " . ceil($value_rating); ?>
<?php echo "<br>" ?>
<?php echo "floor: " . floor($value_rating); ?>
<?php echo "<br>" ?>
<?php echo "round: " . round($value_rating); ?>

<div class="rating-container theme-krajee-svg rating-xs rating-animate rating-disabled">
    <div class="rating-stars custom-rating-stars-cursor-unset" tabindex="0">
        <span class="empty-stars">
            <span class="star custom-star" title="One Star">
                <span class="icon-star-empty"></span>
            </span>
            <span class="star custom-star" title="Two Stars">
                <span class="icon-star-empty"></span>
            </span>
            <span class="star custom-star" title="Three Stars">
                <span class="icon-star-empty"></span>
            </span>
            <span class="star custom-star" title="Four Stars">
                <span class="icon-star-empty"></span>
            </span>
            <span class="star custom-star" title="Five Stars">
                <span class="icon-star-empty"></span>
            </span>
        </span>
        <span class="filled-stars">
            <span class="star custom-star" title="">
                <?php for($i = 1; $i <= $value_rating; $i++) : ?>
                    <span class="icon-star3"></span>
                <?php endfor; ?>
                <?php if(round($value_rating) > $value_rating) : ?>
                    <span class="icon-star-half-full"></span>
                <?php endif; ?>
            </span>
        </span>
    </div>
</div>

<?php include_once 'layouts/footer.php' ?>
