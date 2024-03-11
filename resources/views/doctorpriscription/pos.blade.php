

 {
<!DOCTYPE html>
<html lang="en">

	
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        		<style>
		* {
    font-size: 6px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.Qun,
th.Qun {
    width: 40pxpx;
    max-width: 75px;
}

td.productname,
th.productname {
    width: 75px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 140px;
    max-width: 140px;
}


}
</style>
 <?php for ($i=0; $i<3; $i++){ ?>
        
    </head>
    <body>
        <div class="ticket">
          <div style="text-align:center;">
		  <img width="80%" src="img/logo.jpg" >

           </div>
			
						<div style="height:10px;font-size: 6px;" id="1">
			<div style="width:40%; float:left; text-align:left;">
                <u> Money Receipt<u>
				</div>
				<div style="width:60%; float:right">
				Date:</b>21/12/2021
				</div>

				</div>
			
			<div style="height:10px;font-size: 6px;" id="1">
			<div style="width:75%; float:left; text-align:left;">
                Name:Hasibur Rahman Kalil
				</div>
				<div style="width:25%; float:left">
				Age:30
				</div>

				</div>
							<div style="height:6px;font-size: 6px;" >
			<div style="width:75%; float:left; text-align:left;">
                Mob:01912941490
				</div>
				<div style="width:25%; float:left">
				ID:110408
				</div>

				</div>



            <table>
                <thead>
                    <tr>
                        <th class="productname">Pro. Name</th>
                        <th class="Qun">Q.</th>
                        <th class="price">Price</th>
						<th class="price">Discount</th>
						<th class="price">Discounted price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="productname">Max Pro 30</td>
                        <td class="Qun"> 50</td>
                        <td class="price">$25.00</td>
						<td class="price">$25.00</td>
						<td class="price">$25.00</td>
                    </tr>
                    <tr>
                        <td class="productname">Max Pro 30</td>
                        <td class="Qun">30</td>
                        <td class="price">$10.00</td>
						<td class="price">$25.00</td>
						<td class="price">$25.00</td>
                    </tr>
                    <tr>
                        <td class="productname">Max Pro 30</td>
                        <td class="Qun"> 30</td>
                        <td class="price">$10.00</td>
						<td class="price">$25.00</td>
						<td class="price">$25.00</td>
                    </tr>
                    <tr>
                        <td class="productname"></td>
                        <td class="Qun">TOTAL</td>
                        <td class="price">$55.00</td>
						<td class="price">$25.00</td>
						<td class="price">$25.00</td>
                    </tr>
                </tbody>
            </table>
			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
    </body>
	
</html>