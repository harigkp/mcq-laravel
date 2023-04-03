function save_test(id,doing) {

         if(doing=='s'){
			$('#skip_'+id).val(1); 			 
		 }

		 if (typeof $("input[name='option_selected_"+id+"']:checked").val() === "undefined" && doing=='n') {
			$('#err_'+id).show();
			return false;
		}
		 $('#err_'+id).hide();
         $('#btn_'+id).hide();
		 $('.save_loading_'+id).show();
		 
		 var jsonData = {};
		 var formData = $('#frm_'+id).serializeArray();
		 $.each(formData, function() {
			 if (jsonData[this.name]) {
				 if (!jsonData[this.name].push) {
					jsonData[this.name] = [jsonData[this.name]];
				 }
				 jsonData[this.name].push(this.value || '');
			 } else {
				jsonData[this.name] = this.value || '';
			 }
		 });
 

        $.ajax({
            url: base_url + "/submittest",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            dataType: "json",
            data: JSON.stringify(jsonData),
            success: function (data) {
					if(data.success=='Y' && data.status_code==200) {
						$('#success_'+id).val('Thanks.');
						$('#success_'+id).show();
						$('#err_'+id).hide();
						$('#btn_'+id).hide();
						$('.save_loading_'+id).hide();
					}
					if(data.success=='N' && data.status_code==404) {
						$('#success_'+id).hide();
						$('#err_'+id).val('Something issue.');
						$('#err_'+id).show();
						$('#btn_'+id).hide();
						$('.save_loading_'+id).hide();
					}					

            },
        });

}

