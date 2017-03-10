<div class="frm_forms  with_frm_style frm_center_submit frm_style_formidable-style" id="frm_form_13_container">
	<form enctype="multipart/form-data" method="post" class="frm-show-form  frm_pro_form " id="form_frmprocontact2">
	<div class="frm_form_fields ">
	<fieldset>
	<legend class="frm_hidden">Custom Tour</legend>

	<div class="frm_description"><p>Please send us a custom tour enquiry to tell us your travel plans so that we can assist you. You will find that our efficiency, personal touch and high level of service will make your time in Indochina an amazing experience you will never forget. We look forward to receiving your travel request.</p>
	</div>
	<input type="hidden" name="frm_action" value="create">
	<input type="hidden" name="form_id" value="13">
	<input type="hidden" name="frm_hide_fields_13" id="frm_hide_fields_13" value="">
	<input type="hidden" name="form_key" value="frmprocontact2">
	<input type="hidden" name="item_meta[0]" value="">
	<input type="hidden" id="frm_submit_entry_13" name="frm_submit_entry_13" value="3ddbb21f17"><input type="hidden" name="_wp_http_referer" value="/custom-tour/">

	<?php $field_id = 226;
		ob_start();
		include( $path . '/classes/views/frm-forms/add_field.php' );
        $field_html[ $field_id ] = ob_get_contents();
        ob_end_clean();
        echo json_encode($field_html);
	 ?>
	<div id="frm_field_<?php echo $field->id; ?>_container" class="frm_form_field form-field [required_class][error_class]">
	    <label for="field_[key]" class="frm_primary_label">[field_name]
	        <span class="frm_required">[required_label]</span>
	    </label>
	    [input]
	    [if description]<div class="frm_description">[description]</div>[/if description]
	    [if error]<div class="frm_error">[error]</div>[/if error]
	</div>

<div id="frm_field_218_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_last_half">
    <label for="field_xnkv8k2" class="frm_primary_label">Email Address
        <span class="frm_required">*</span>
    </label>
    <input type="email" id="field_xnkv8k2" name="item_meta[218]" value="" data-reqmsg="This field cannot be blank." data-invmsg="Please enter a valid email address"> 
</div>

<div id="frm_field_220_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_first_half">
    <label for="field_3l3cwp2" class="frm_primary_label">Phone Number
        <span class="frm_required">*</span>
    </label>
    <input type="text" id="field_3l3cwp2" name="item_meta[220]" value="" data-reqmsg="This field cannot be blank.">
</div>

<div id="frm_field_221_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_last_half">
    <label for="field_puitbx2" class="frm_primary_label">Country
        <span class="frm_required">*</span>
    </label>
    <input type="text" id="field_puitbx2" name="item_meta[221]" value="" data-reqmsg="This field cannot be blank.">
</div>

<div id="frm_field_227_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_first_half">
    <label for="field_ijj0j" class="frm_primary_label">Number of Adults
        <span class="frm_required">*</span>
    </label>
    <input type="text" id="field_ijj0j" name="item_meta[227]" value="" data-reqmsg="This field cannot be blank.">
</div>

<div id="frm_field_228_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_last_half">
    <label for="field_isjaa" class="frm_primary_label">Number of Children
        <span class="frm_required">*</span>
    </label>
    <input type="text" id="field_isjaa" name="item_meta[228]" value="" data-reqmsg="This field cannot be blank.">
</div>
<div id="frm_field_231_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_first_half">
    <label for="field_hytee" class="frm_primary_label">Arrival Date
        <span class="frm_required">*</span>
    </label>
    <input type="text" id="field_hytee" name="item_meta[231]" value="" maxlength="10" data-reqmsg="This field cannot be blank.">
</div>
<div id="frm_field_232_container" class="frm_form_field form-field  frm_top_container frm_last_half">
    <label for="field_cjxoj" class="frm_primary_label">Departure Date
        <span class="frm_required"></span>
    </label>
    <input type="text" id="field_cjxoj" name="item_meta[232]" value="" maxlength="10"> 
</div>

<div id="frm_field_233_container" class="frm_form_field form-field  frm_top_container frm_first_half">
    <label for="field_dc38o" class="frm_primary_label">Port of Arrival
        <span class="frm_required"></span>
    </label>
    		<div class="selection-box"><select name="item_meta[233]" id="field_dc38o" data-frmval="Please Select">
			<option value="Please Select" selected="selected">Please Select</option>
				<option value="Hanoi">Hanoi</option>
				<option value="Ho Chi Minh">Ho Chi Minh</option>
				<option value="Danang">Danang</option>
				<option value="Mekong River">Mekong River</option>
				<option value="Vientiane">Vientiane</option>
				<option value="Luan Prabang">Luan Prabang</option>
				<option value="Phnom Penh">Phnom Penh</option>
				<option value="Siam Reap">Siam Reap</option>
			</select></div>
</div>

<div id="frm_field_234_container" class="frm_form_field form-field  frm_top_container frm_last_half">
    <label for="field_olxx5" class="frm_primary_label">Port of Departure
        <span class="frm_required"></span>
    </label>
    		<div class="selection-box"><select name="item_meta[234]" id="field_olxx5" data-frmval="Please Select">
			<option value="Please Select" selected="selected">Please Select</option>
				<option value="Hanoi">Hanoi</option>
				<option value="Ho Chi Minh">Ho Chi Minh</option>
				<option value="Danang">Danang</option>
				<option value="Mekong River">Mekong River</option>
				<option value="Vientiane">Vientiane</option>
				<option value="Luan Prabang">Luan Prabang</option>
				<option value="Phnom Penh">Phnom Penh</option>
				<option value="Siam Reap">Siam Reap</option>
			</select></div>
</div>

<div id="frm_field_243_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">Which countries would you like to Visit?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_243-0"><label for="field_20jj0-0"><input type="checkbox" name="item_meta[243][]" id="field_20jj0-0" value="Vietnam" data-reqmsg="This field cannot be blank."> Vietnam</label></div>
			<div class="frm_checkbox" id="frm_checkbox_243-1"><label for="field_20jj0-1"><input type="checkbox" name="item_meta[243][]" id="field_20jj0-1" value="Cambodia" data-reqmsg="This field cannot be blank."> Cambodia</label></div>
			<div class="frm_checkbox" id="frm_checkbox_243-2"><label for="field_20jj0-2"><input type="checkbox" name="item_meta[243][]" id="field_20jj0-2" value="Laos" data-reqmsg="This field cannot be blank."> Laos</label></div>
	</div>
    
    
</div>

<div id="frm_field_235_container" class="frm_form_field form-field  frm_top_container frm_three_col">
    <label class="frm_primary_label">Which destinations would you like to Visit in Vietnam?
        <span class="frm_required"></span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_235-0"><label for="field_xi6uy-0"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-0" value="Ha Noi"> Ha Noi</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-1"><label for="field_xi6uy-1"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-1" value="Ninh Binh"> Ninh Binh</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-2"><label for="field_xi6uy-2"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-2" value="Sapa"> Sapa</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-3"><label for="field_xi6uy-3"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-3" value="Mai Chau"> Mai Chau</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-4"><label for="field_xi6uy-4"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-4" value="Halong Bay"> Halong Bay</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-5"><label for="field_xi6uy-5"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-5" value="Hoi An"> Hoi An</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-6"><label for="field_xi6uy-6"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-6" value="Hue"> Hue</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-7"><label for="field_xi6uy-7"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-7" value="Da Nang"> Da Nang</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-8"><label for="field_xi6uy-8"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-8" value="Nha Trang"> Nha Trang</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-9"><label for="field_xi6uy-9"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-9" value="Ho Chi Minh City"> Ho Chi Minh City</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-10"><label for="field_xi6uy-10"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-10" value="Mekong Delta"> Mekong Delta</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-11"><label for="field_xi6uy-11"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-11" value="Phu Quoc"> Phu Quoc</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-12"><label for="field_xi6uy-12"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-12" value="Bac Ha"> Bac Ha</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-13"><label for="field_xi6uy-13"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-13" value="Cai Be"> Cai Be</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-14"><label for="field_xi6uy-14"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-14" value="Cantho"> Cantho</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-15"><label for="field_xi6uy-15"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-15" value="Cao Bang"> Cao Bang</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-16"><label for="field_xi6uy-16"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-16" value="Chau Doc"> Chau Doc</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-17"><label for="field_xi6uy-17"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-17" value="Da Lat"> Da Lat</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-18"><label for="field_xi6uy-18"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-18" value="Dien Bien"> Dien Bien</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-19"><label for="field_xi6uy-19"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-19" value="Ha Giang"> Ha Giang</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-20"><label for="field_xi6uy-20"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-20" value="Hai Phong"> Hai Phong</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-21"><label for="field_xi6uy-21"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-21" value="Hoa Binh"> Hoa Binh</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-22"><label for="field_xi6uy-22"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-22" value="Lai Chau"> Lai Chau</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-23"><label for="field_xi6uy-23"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-23" value="Lang Son"> Lang Son</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-24"><label for="field_xi6uy-24"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-24" value="Lao Cai"> Lao Cai</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-25"><label for="field_xi6uy-25"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-25" value="Muine"> Muine</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-26"><label for="field_xi6uy-26"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-26" value="Phan Thiet"> Phan Thiet</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-27"><label for="field_xi6uy-27"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-27" value="My Tho"> My Tho</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-28"><label for="field_xi6uy-28"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-28" value="Tam Dao"> Tam Dao</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-29"><label for="field_xi6uy-29"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-29" value="Tuyen Quang"> Tuyen Quang</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-30"><label for="field_xi6uy-30"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-30" value="Vinh Long"> Vinh Long</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-31"><label for="field_xi6uy-31"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-31" value="Vung Tau"> Vung Tau</label></div>
			<div class="frm_checkbox" id="frm_checkbox_235-32"><label for="field_xi6uy-32"><input type="checkbox" name="item_meta[235][]" id="field_xi6uy-32" value="Yen Bai"> Yen Bai</label></div>
</div>
    
    
</div>
<div id="frm_field_246_container" class="frm_form_field form-field  frm_top_container frm_three_col">
    <label class="frm_primary_label">Which destinations would you like to Visit in Cambodia?
        <span class="frm_required"></span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_246-0"><label for="field_sc447-0"><input type="checkbox" name="item_meta[246][]" id="field_sc447-0" value="Angkor Thom"> Angkor Thom</label></div>
			<div class="frm_checkbox" id="frm_checkbox_246-1"><label for="field_sc447-1"><input type="checkbox" name="item_meta[246][]" id="field_sc447-1" value="Angkor Wat"> Angkor Wat</label></div>
			<div class="frm_checkbox" id="frm_checkbox_246-2"><label for="field_sc447-2"><input type="checkbox" name="item_meta[246][]" id="field_sc447-2" value="Kampong Cham"> Kampong Cham</label></div>
			<div class="frm_checkbox" id="frm_checkbox_246-3"><label for="field_sc447-3"><input type="checkbox" name="item_meta[246][]" id="field_sc447-3" value="Phnom Penh"> Phnom Penh</label></div>
			<div class="frm_checkbox" id="frm_checkbox_246-4"><label for="field_sc447-4"><input type="checkbox" name="item_meta[246][]" id="field_sc447-4" value="Siem Reap"> Siem Reap</label></div>
			<div class="frm_checkbox" id="frm_checkbox_246-5"><label for="field_sc447-5"><input type="checkbox" name="item_meta[246][]" id="field_sc447-5" value="Sihanouk ville"> Sihanouk ville</label></div>
</div>
    
    
</div>
<div id="frm_field_247_container" class="frm_form_field form-field  frm_top_container frm_three_col">
    <label class="frm_primary_label">Which destinations would you like to Visit in Laos?
        <span class="frm_required"></span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_247-0"><label for="field_7dko2-0"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-0" value="Khouangsi Waterfalls"> Khouangsi Waterfalls</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-1"><label for="field_7dko2-1"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-1" value="Luang Prabang"> Luang Prabang</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-2"><label for="field_7dko2-2"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-2" value="Pakbeng"> Pakbeng</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-3"><label for="field_7dko2-3"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-3" value="Pakou"> Pakou</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-4"><label for="field_7dko2-4"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-4" value="Pakse"> Pakse</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-5"><label for="field_7dko2-5"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-5" value="Savannakhet"> Savannakhet</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-6"><label for="field_7dko2-6"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-6" value="Vang Vieng"> Vang Vieng</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-7"><label for="field_7dko2-7"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-7" value="Vientiane"> Vientiane</label></div>
			<div class="frm_checkbox" id="frm_checkbox_247-8"><label for="field_7dko2-8"><input type="checkbox" name="item_meta[247][]" id="field_7dko2-8" value="Wat Phou"> Wat Phou</label></div>
</div>
    
    
</div>
<div id="frm_field_239_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">What type of programme interstests you?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_239-0"><label for="field_gbp06-0"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-0" value="Classic Highlights" data-reqmsg="This field cannot be blank."> Classic Highlights</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-1"><label for="field_gbp06-1"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-1" value="Family Holidays" data-reqmsg="This field cannot be blank."> Family Holidays</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-2"><label for="field_gbp06-2"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-2" value="Local Life Tours" data-reqmsg="This field cannot be blank."> Local Life Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-3"><label for="field_gbp06-3"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-3" value="Luxury And Honeymoon" data-reqmsg="This field cannot be blank."> Luxury And Honeymoon</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-4"><label for="field_gbp06-4"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-4" value="Day Tours &amp; Trips" data-reqmsg="This field cannot be blank."> Day Tours &amp; Trips</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-5"><label for="field_gbp06-5"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-5" value="Beach Holidays" data-reqmsg="This field cannot be blank."> Beach Holidays</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-6"><label for="field_gbp06-6"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-6" value="Adventure Tours" data-reqmsg="This field cannot be blank."> Adventure Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-7"><label for="field_gbp06-7"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-7" value="Halong Bay Cruises" data-reqmsg="This field cannot be blank."> Halong Bay Cruises</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-8"><label for="field_gbp06-8"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-8" value="Mekong Delta Cruises" data-reqmsg="This field cannot be blank."> Mekong Delta Cruises</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-9"><label for="field_gbp06-9"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-9" value="Motorbike Tours" data-reqmsg="This field cannot be blank."> Motorbike Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-10"><label for="field_gbp06-10"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-10" value="Cycling Tours" data-reqmsg="This field cannot be blank."> Cycling Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-11"><label for="field_gbp06-11"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-11" value="Walking &amp; Trekking" data-reqmsg="This field cannot be blank."> Walking &amp; Trekking</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-12"><label for="field_gbp06-12"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-12" value="18 To 35 Tours" data-reqmsg="This field cannot be blank."> 18 To 35 Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-13"><label for="field_gbp06-13"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-13" value="Muslim Tours" data-reqmsg="This field cannot be blank."> Muslim Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-14"><label for="field_gbp06-14"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-14" value="Short &amp; City Breaks" data-reqmsg="This field cannot be blank."> Short &amp; City Breaks</label></div>
			<div class="frm_checkbox" id="frm_checkbox_239-15"><label for="field_gbp06-15"><input type="checkbox" name="item_meta[239][]" id="field_gbp06-15" value="Photograph Tours" data-reqmsg="This field cannot be blank."> Photograph Tours</label></div>
</div>
    
    
</div>
<div id="frm_field_238_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">What modes of Transportation do you prefer?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_238-0"><label for="field_vkota-0"><input type="checkbox" name="item_meta[238][]" id="field_vkota-0" value="Airplane" data-reqmsg="This field cannot be blank."> Airplane</label></div>
			<div class="frm_checkbox" id="frm_checkbox_238-1"><label for="field_vkota-1"><input type="checkbox" name="item_meta[238][]" id="field_vkota-1" value="Private Car" data-reqmsg="This field cannot be blank."> Private Car</label></div>
			<div class="frm_checkbox" id="frm_checkbox_238-2"><label for="field_vkota-2"><input type="checkbox" name="item_meta[238][]" id="field_vkota-2" value="Bus" data-reqmsg="This field cannot be blank."> Bus</label></div>
			<div class="frm_checkbox" id="frm_checkbox_238-3"><label for="field_vkota-3"><input type="checkbox" name="item_meta[238][]" id="field_vkota-3" value="Train" data-reqmsg="This field cannot be blank."> Train</label></div>
			<div class="frm_checkbox" id="frm_checkbox_238-4"><label for="field_vkota-4"><input type="checkbox" name="item_meta[238][]" id="field_vkota-4" value="Bicycles" data-reqmsg="This field cannot be blank."> Bicycles</label></div>
			<div class="frm_checkbox" id="frm_checkbox_238-5"><label for="field_vkota-5"><input type="checkbox" name="item_meta[238][]" id="field_vkota-5" value="Motorbike" data-reqmsg="This field cannot be blank."> Motorbike</label></div>
</div>
    
    
</div>
<div id="frm_field_230_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">What type of accommodation do you prefer?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_230-0"><label for="field_z3xkj-0"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-0" value="2 stars (US$30-40) " data-reqmsg="This field cannot be blank."> 2 stars (US$30-40) </label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-1"><label for="field_z3xkj-1"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-1" value="3 stars standard (US$40-60) " data-reqmsg="This field cannot be blank."> 3 stars standard (US$40-60) </label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-2"><label for="field_z3xkj-2"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-2" value="3 stars superior (US$60-90) " data-reqmsg="This field cannot be blank."> 3 stars superior (US$60-90) </label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-3"><label for="field_z3xkj-3"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-3" value="4 stars (US$90-130) " data-reqmsg="This field cannot be blank."> 4 stars (US$90-130) </label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-4"><label for="field_z3xkj-4"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-4" value="5 stars (US$130-200) " data-reqmsg="This field cannot be blank."> 5 stars (US$130-200) </label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-5"><label for="field_z3xkj-5"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-5" value="Luxury Accommodation" data-reqmsg="This field cannot be blank."> Luxury Accommodation</label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-6"><label for="field_z3xkj-6"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-6" value="Homestay with locals" data-reqmsg="This field cannot be blank."> Homestay with locals</label></div>
			<div class="frm_checkbox" id="frm_checkbox_230-7"><label for="field_z3xkj-7"><input type="checkbox" name="item_meta[230][]" id="field_z3xkj-7" value="Hostel Accommodation" data-reqmsg="This field cannot be blank."> Hostel Accommodation</label></div>
</div>
    
    
</div>
<div id="frm_field_245_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">What style of tours and activities do you prefer?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_245-0"><label for="field_hemuw-0"><input type="checkbox" name="item_meta[245][]" id="field_hemuw-0" value="Group Style Tours" data-reqmsg="This field cannot be blank."> Group Style Tours</label></div>
			<div class="frm_checkbox" id="frm_checkbox_245-1"><label for="field_hemuw-1"><input type="checkbox" name="item_meta[245][]" id="field_hemuw-1" value="Private Style Tours" data-reqmsg="This field cannot be blank."> Private Style Tours</label></div>
</div>
    
    
</div>
<div id="frm_field_242_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">What pace of travel do you prefer?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_242-0"><label for="field_envg5-0"><input type="checkbox" name="item_meta[242][]" id="field_envg5-0" value="Whirlwind Pace" data-reqmsg="This field cannot be blank."> Whirlwind Pace</label></div>
			<div class="frm_checkbox" id="frm_checkbox_242-1"><label for="field_envg5-1"><input type="checkbox" name="item_meta[242][]" id="field_envg5-1" value="Moderate Pace" data-reqmsg="This field cannot be blank."> Moderate Pace</label></div>
			<div class="frm_checkbox" id="frm_checkbox_242-2"><label for="field_envg5-2"><input type="checkbox" name="item_meta[242][]" id="field_envg5-2" value="Relaxed Pace" data-reqmsg="This field cannot be blank."> Relaxed Pace</label></div>
</div>
    
    
</div>
<div id="frm_field_240_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_three_col">
    <label class="frm_primary_label">Would you like us to include meals in the Itinerary?
        <span class="frm_required">*</span>
    </label>
    <div class="frm_opt_container">			<div class="frm_checkbox" id="frm_checkbox_240-0"><label for="field_mivm5-0"><input type="checkbox" name="item_meta[240][]" id="field_mivm5-0" value="Breakfast" data-reqmsg="This field cannot be blank."> Breakfast</label></div>
			<div class="frm_checkbox" id="frm_checkbox_240-1"><label for="field_mivm5-1"><input type="checkbox" name="item_meta[240][]" id="field_mivm5-1" value="Lunch" data-reqmsg="This field cannot be blank."> Lunch</label></div>
			<div class="frm_checkbox" id="frm_checkbox_240-2"><label for="field_mivm5-2"><input type="checkbox" name="item_meta[240][]" id="field_mivm5-2" value="Dinner" data-reqmsg="This field cannot be blank."> Dinner</label></div>
</div>
    
    
</div>
<div id="frm_field_248_container" class="frm_form_field form-field  frm_top_container frm_first_half">
    <label for="field_xzm8" class="frm_primary_label">What is your Budget Per Person for the trip?
        <span class="frm_required"></span>
    </label>
    <input type="text" id="field_xzm8" name="item_meta[248]" value="">

    
    
</div>
<div id="frm_field_249_container" class="frm_form_field form-field  frm_top_container frm_last_half">
    <label for="field_6fiyv" class="frm_primary_label">Get a call from a Destination Expert?
        <span class="frm_required"></span>
    </label>
    		<div class="selection-box"><select name="item_meta[249]" id="field_6fiyv" data-frmval="Please Select">
			<option value="Please Select" selected="selected">Please Select</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select></div>
	
    
    
</div>
<div id="frm_field_241_container" class="frm_form_field form-field  frm_required_field frm_top_container frm_full">
    <label for="field_wiirp" class="frm_primary_label">Describe Requirements:
        <span class="frm_required">*</span>
    </label>
    <textarea name="item_meta[241]" id="field_wiirp" rows="5" data-frmval="Please give us as much information and detail as possible which will help us deal with your request." data-reqmsg="This field cannot be blank.">Please give us as much information and detail as possible which will help us deal with your request.</textarea>

    
    
</div>
<input type="hidden" name="item_key" value="">
<div class="frm_submit">

<input type="submit" value="Submit Your Request" formnovalidate="formnovalidate">
<img class="frm_ajax_loading" src="http://viland-travel.tk/wp-content/plugins/formidable/images/ajax_loader.gif" alt="Sending">

</div></fieldset>
</div>
</form>
</div>