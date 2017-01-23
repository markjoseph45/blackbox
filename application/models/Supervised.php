<?php 
class Supervised extends CI_Model {

	function save($category){
				$prod_name = $this->input->post('prod_name');
				$details = $this->input->post('details');
				$prod_specification0 = $this->input->post('prod_specification0');
				$prod_specification1 = $this->input->post('prod_specification1');
				$prod_specification2 = $this->input->post('prod_specification2');
				$prod_specification3 = $this->input->post('prod_specification3');
				$prod_specification4 = $this->input->post('prod_specification4');
				$prod_specification5 = $this->input->post('prod_specification5');
				$prod_specification6 = $this->input->post('prod_specification6');
				$prod_specification7 = $this->input->post('prod_specification7');
				$prod_specification8 = $this->input->post('prod_specification8');
				$prod_specification9 = $this->input->post('prod_specification9');
				$prod_color0 = $this->input->post('prod_color0');
				$prod_color1 = $this->input->post('prod_color1');
				$prod_color2 = $this->input->post('prod_color2');
				$prod_color3 = $this->input->post('prod_color3');
				$prod_color4 = $this->input->post('prod_color4');
				$prod_color5 = $this->input->post('prod_color5');
				$prod_color6 = $this->input->post('prod_color6');
				$prod_color7 = $this->input->post('prod_color7');
				$prod_color8 = $this->input->post('prod_color8');
				$prod_color9 = $this->input->post('prod_color9');
				$category = $this->input->post('category');
				$subcategory = $this->input->post('subcategory');
				if ($category == 'Clothing'):
				$prod_cloth_size0 = $this->input->post('prod_cloth_size0');
				$prod_cloth_size1 = $this->input->post('prod_cloth_size1');
				$prod_cloth_size2 = $this->input->post('prod_cloth_size2');
				$prod_cloth_size3 = $this->input->post('prod_cloth_size3');
				$prod_cloth_size4 = $this->input->post('prod_cloth_size4');
				elseif ($category == 'Shoes'):
				$prod_shoe_size0 = $this->input->post('prod_shoe_size0');
				$prod_shoe_size1 = $this->input->post('prod_shoe_size1');
				$prod_shoe_size2 = $this->input->post('prod_shoe_size2');
				$prod_shoe_size3 = $this->input->post('prod_shoe_size3');
				$prod_shoe_size4 = $this->input->post('prod_shoe_size4');	
				$prod_shoe_size5 = $this->input->post('prod_shoe_size5');	
				$prod_shoe_size6 = $this->input->post('prod_shoe_size6');	
				$prod_shoe_size7 = $this->input->post('prod_shoe_size7');					
				endif;
				$brand = $this->input->post('brand');
				$price = $this->input->post('price');
				$priceDiscount = $this->input->post('priceDiscount');
				$priceOff = $this->input->post('priceOff');
				$stocks = $this->input->post('stocks');
				$image0 = $this->input->post('image0');
				$image1 = $this->input->post('image1');
				$image2 = $this->input->post('image2');
				$image3 = $this->input->post('image3');
				$image4 = $this->input->post('image4');

			if ($category == 'Clothing'):
			$data = array('prod_name' => $prod_name, 'prod_details' => $details, 
				'prod_spec0' => $prod_specification0, 'prod_spec1' => $prod_specification1, 
				'prod_spec2' => $prod_specification2, 'prod_spec3' => $prod_specification3, 
				'prod_spec4' => $prod_specification4, 'prod_spec5' => $prod_specification5, 
				'prod_spec6' => $prod_specification6, 'prod_spec7' => $prod_specification7, 
				'prod_spec8' => $prod_specification8, 'prod_spec9' => $prod_specification9, 
				'prod_color0' => $prod_color0, 'prod_color1' => $prod_color1, 'prod_color2' => $prod_color2, 
				'prod_color3' => $prod_color3, 'prod_color4' => $prod_color4, 'prod_color5' => $prod_color5, 
				'prod_color6' => $prod_color6, 'prod_color7' => $prod_color7, 'prod_color8' => $prod_color8, 
				'prod_color9' => $prod_color9, 
				'prod_category' => $category, 'prod_subcategory' => $subcategory, 
				'cloth_size0' => $prod_cloth_size0, 
				'cloth_size1' => $prod_cloth_size1, 
				'cloth_size2' => $prod_cloth_size2, 
				'cloth_size3' => $prod_cloth_size3, 
				'cloth_size4' => $prod_cloth_size4, 
				'prod_brand' => $brand, 'prod_price' => $price, 'price_discount' => $priceDiscount, 
				'price_off' => $priceOff, 
				'prod_stocks' => $stocks, 
				'image0' => $image0, 'image1' => $image1, 'image2' => $image2, 
				'image3' => $image3, 'image4' => $image4);
			return $data;
			elseif ($category == 'Shoes'):
			$data = array('prod_name' => $prod_name, 'prod_details' => $details, 
				'prod_spec0' => $prod_specification0, 'prod_spec1' => $prod_specification1, 
				'prod_spec2' => $prod_specification2, 'prod_spec3' => $prod_specification3, 
				'prod_spec4' => $prod_specification4, 'prod_spec5' => $prod_specification5, 
				'prod_spec6' => $prod_specification6, 'prod_spec7' => $prod_specification7, 
				'prod_spec8' => $prod_specification8, 'prod_spec9' => $prod_specification9, 
				'prod_color0' => $prod_color0, 'prod_color1' => $prod_color1, 'prod_color2' => $prod_color2, 
				'prod_color3' => $prod_color3, 'prod_color4' => $prod_color4, 'prod_color5' => $prod_color5, 
				'prod_color6' => $prod_color6, 'prod_color7' => $prod_color7, 'prod_color8' => $prod_color8, 
				'prod_color9' => $prod_color9, 
				'prod_category' => $category, 'prod_subcategory' => $subcategory, 
				'shoe_size0' => $prod_shoe_size0, 
				'shoe_size1' => $prod_shoe_size1, 
				'shoe_size2' => $prod_shoe_size2, 
				'shoe_size3' => $prod_shoe_size3, 
				'shoe_size4' => $prod_shoe_size4, 
				'shoe_size5' => $prod_shoe_size5,
				'shoe_size6' => $prod_shoe_size6,
				'shoe_size7' => $prod_shoe_size7,
				'prod_brand' => $brand, 'prod_price' => $price, 'price_discount' => $priceDiscount, 
				'price_off' => $priceOff, 
				'prod_stocks' => $stocks, 
				'image0' => $image0, 'image1' => $image1, 'image2' => $image2, 
				'image3' => $image3, 'image4' => $image4);
			return $data;
			elseif ($category != 'Shoes' && $category != 'Clothing'):
			$data = array('prod_name' => $prod_name, 'prod_details' => $details, 
				'prod_spec0' => $prod_specification0, 'prod_spec1' => $prod_specification1, 
				'prod_spec2' => $prod_specification2, 'prod_spec3' => $prod_specification3, 
				'prod_spec4' => $prod_specification4, 'prod_spec5' => $prod_specification5, 
				'prod_spec6' => $prod_specification6, 'prod_spec7' => $prod_specification7, 
				'prod_spec8' => $prod_specification8, 'prod_spec9' => $prod_specification9, 
				'prod_color0' => $prod_color0, 'prod_color1' => $prod_color1, 'prod_color2' => $prod_color2, 
				'prod_color3' => $prod_color3, 'prod_color4' => $prod_color4, 'prod_color5' => $prod_color5, 
				'prod_color6' => $prod_color6, 'prod_color7' => $prod_color7, 'prod_color8' => $prod_color8, 
				'prod_color9' => $prod_color9, 
				'prod_category' => $category, 'prod_subcategory' => $subcategory, 
				'prod_brand' => $brand, 'prod_price' => $price, 'price_discount' => $priceDiscount, 
				'price_off' => $priceOff, 
				'prod_stocks' => $stocks, 
				'image0' => $image0, 'image1' => $image1, 'image2' => $image2, 
				'image3' => $image3, 'image4' => $image4);
			return $data;
			endif;
			
	}


}
?>