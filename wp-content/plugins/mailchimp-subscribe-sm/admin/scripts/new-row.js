( function( $ ) { 

$( document ).on('click',".addNewRowVisible", function() {


    pageBuilderApp.rowList.add( {
      rowID: 'ulpb_Row'+Math.floor((Math.random() * 200000) + 100),
      rowHeight: 100,
      columns: 0,
      rowData: {
          rowCustomClass:'',
          bg_color: '#fff',
          bg_img: '',
          margin: {
            rowMarginTop: 0,
            rowMarginBottom: 0,
            rowMarginLeft: 0,
            rowMarginRight: 0,
          },
          marginTablet:{
            rMTT:'',
            rMBT:'',
            rMLT:'',
            rMRT:'',
          },
          marginMobile:{
            rMTM:'',
            rMBM:'',
            rMLM:'',
            rMRM:'',
          },
          padding:{
            rowPaddingTop: 0,
            rowPaddingBottom: 0,
            rowPaddingLeft: 0,
            rowPaddingRight: 0,
          },
          paddingTablet:{
            rPTT:'',
            rPBT:'',
            rPLT:'',
            rPRT:'',
          },
          paddingMobile:{
            rPTM:'',
            rPBM:'',
            rPLM:'',
            rPRM:'',
          },
          video:{
            rowBgVideoEnable: 'false',
            rowBgVideoLoop: 'loop',
            rowVideoMpfour: ' ',
            rowVideoWebM: ' ',
            rowVideoThumb: ' ',
          },
          customStyling: '',
          customJS: ' ',
          rowBackgroundType:'solid',
          rowGradient:{
            rowGradientColorFirst: '#dd9933',
            rowGradientLocationFirst:'40',
            rowGradientColorSecond:'#eeee22',
            rowGradientLocationSecond:'60',
            rowGradientType:'linear',
            rowGradientPosition:'top left',
            rowGradientAngle:'135',
          }
        }
    });
    $('.new_row_div').slideUp();
    //$('#ulpb_row_controls').remove();

  $('#newRowClose').click(function(){
      $('.new_row_div').slideUp();
      $('#ulpb_row_controls').hide();
  });

});


$('.addNewGlobalRowVisible').on('click', function(){

  $('.insert_Global_row').show(300);
        
      $('.addNewGlobalRowClosebutton').one('click',function(){
                $('.globalRowRetrievedAttributes').val('');
                selectGlobalRowToInsert = $('.selectGlobalRowToInsert').val();

                if (selectGlobalRowToInsert != '') {
                  getGlobalRowDataFromDb(selectGlobalRowToInsert);
                }
                
                retrievedGlobalRowAttributes = $('.globalRowRetrievedAttributes').val();
                
                if (retrievedGlobalRowAttributes != '') {
                  pageBuilderApp.rowList.add(  JSON.parse(retrievedGlobalRowAttributes));
                }

      $('.insert_Global_row').hide(300);


  });

});



}( jQuery ) );