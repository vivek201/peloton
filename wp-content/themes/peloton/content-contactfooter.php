<div class="container forBorder">
    <div class="row">
        <?php for ($i = 1; $i <=2 ; $i++): ?>
        <?php
            $contact_details = get_option('pt_contact_details' . $i);  
        ?>
        
        <div class="col-lg-6">
            <h3><?php echo strtoupper($contact_details['location']); ?></h3>
            <div class="office">
                <ul>
                    <?php if (isset($contact_details['address1'])): ?>
                    <li><?php echo $contact_details['address1'] ?></li>
                    <?php endif; ?>
                    <?php if (isset($contact_details['address2'])): ?>
                    <li><?php echo $contact_details['address2'] ?></li>
                    <?php endif; ?>
                    <?php if (isset($contact_details['address3'])): ?>
                    <li><?php echo $contact_details['address3'] ?></li>
                    <?php endif; ?>
                    <?php if (isset($contact_details['contact_no'])): ?>
                    <li>T: <?php echo $contact_details['contact_no'] ?></li>
                    <?php endif; ?>
                    <?php if (isset($contact_details['fax_no'])): ?>
                    <li>F: <?php echo $contact_details['fax_no'] ?></li>
                    <?php endif; ?>
                    <?php if (isset($contact_details['email'])): ?>
                    <li>E: <?php echo $contact_details['email'] ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <hr class="hidden-lg" />
        <?php endfor; ?>
    </div>
</div>