<?php
require '../../../PHP/Functions.php';



$conn = connect(); 
$name = mysqli_real_escape_string($conn, $_POST['name']); 
$sql = "
    SELECT 
        p.id,
        p.title,
        p.PRIX,
        p.Quantity,
        p.image_file,
        c.Category_name,
        COALESCE(s.times_sold, 0) AS times_sold
    FROM 
        products p
    INNER JOIN 
        category c ON c.id = p.id_category 
    LEFT JOIN (
        SELECT 
            id_product,
            COUNT(*) AS times_sold
        FROM 
            order_product
        GROUP BY 
            id_product
    ) s ON p.id = s.id_product
    WHERE 
        (p.title LIKE '%$name%' OR p.title LIKE '%$name' OR p.title LIKE '$name%')
    ORDER BY 
        p.title;
";

$query = mysqli_query($conn, $sql);

$data = "<table>
 <thead>
<tr>
    <td>Image Product</td>
    <td>Id</td>
    <td>Title</td>
    
    <td>Price</td>
    <td>Category</td>
    <td>Quantity</td>
    <td>Times sold</td>
    <td>Actions</td>
</tr>
</thead>";

while ($row = mysqli_fetch_assoc($query)) {
    $data .= "<tr";

    if ($row['Quantity'] <= 0) {
        $data .= " class=\"red_row\"";
    }
    
    $data .= ">
    <td><img src=\"../../../product_images/{$row['image_file']}\" alt=\"\" height=\"50px\" width=\"50px\"></td>
    <td>{$row['id']}</td>
    <td>{$row['title']}</td>
    <td>{$row['PRIX']}</td>
    <td>{$row['Category_name']}</td>
    <td>{$row['Quantity']}</td>
    <td>{$row['times_sold']}</td>

   
   
    <td>
    <a onclick=\"openForm('{$row['id']} ')\">
            <svg viewBox=\"0 0 48 48\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g>
                <g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g>
                <g id=\"SVGRepo_iconCarrier\">
                    <rect width=\"48\" height=\"48\" fill=\"white\" fill-opacity=\"0.01\"></rect>
                    <path d=\"M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6\" stroke=\"#000000\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>
                    <path d=\"M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z\" fill=\"#2F88FF\" stroke=\"#000000\" stroke-width=\"4\" stroke-linejoin=\"round\"></path>
                </g>
            </svg>
        </a>
          <a onclick=\"openForm('{$row['id']} ')\">
         <svg viewBox=\"0 0 1024 1024\" class=\"icon\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"#000000\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke=\"#CCCCCC\" stroke-width=\"10.24\"><path d=\"M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z\" fill=\"#0452c8\"></path><path d=\"M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z\" fill=\"#5F6379\"></path></g><g id=\"SVGRepo_iconCarrier\"><path d=\"M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z\" fill=\"#0452c8\"></path><path d=\"M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z\" fill=\"#5F6379\"></path></g></svg>
        </a>

    </td>
</tr>";


}

$data .= "</table>";
echo $data;
?>
