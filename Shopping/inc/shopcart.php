<?php


if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['p_id'] == $remove_id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }
    header('Location: ' . strtok($_SERVER["REQUEST_URI"],'?'));
    exit();
}

if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['p_id'];

    if (isset($_SESSION['cart'])) {
        $product_array_ids = array_column($_SESSION['cart'], 'p_id');

        if (in_array($product_id, $product_array_ids)) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['p_id'] == $product_id) {
                    $item['qty'] += intval($_GET['qty']);
                    break;
                }
            }
            unset($item);
        } else {
            $product_array = array(
                'p_id' => $product_id,
                'product_name' => $_GET['product_name'],
                'price' => floatval($_GET['price']),
                'img' => $_GET['img'],
                'qty' => intval($_GET['qty'])
            );
            $_SESSION['cart'][] = $product_array;
        }
    } else {
        $product_array = array(
            'p_id' => $product_id,
            'product_name' => $_GET['product_name'],
            'price' => floatval($_GET['price']),
            'img' => $_GET['img'],
            'qty' => intval($_GET['qty'])
        );
        $_SESSION['cart'] = array($product_array);
    }
}
?>

<section class="shop-cart spad">
    <div class="container">
        <form method="GET" action="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0;

                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $index => $item) {
                                    $subtotal = $item['price'] * $item['qty'];
                                    $total += $subtotal;
                                    echo '
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="../admin/img/' . htmlspecialchars($item['img']) . '" alt="" style="width:70px;">
                                            <div class="cart__product__item__title">
                                                <h6>' . htmlspecialchars($item['product_name']) . '</h6>
                                            </div>
                                        </td>
                                        <td class="cart__price">$' . number_format($item['price'], 2) . '</td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty">
                                                <input type="number" name="qty[' . $index . ']" value="' . intval($item['qty']) . '" min="1" style="width:50px;">
                                                <input type="hidden" name="p_id[' . $index . ']" value="' . htmlspecialchars($item['p_id']) . '">
                                            </div>
                                        </td>
                                        <td class="cart__total">$' . number_format($subtotal, 2) . '</td>
                                        <td class="cart__close"><a href="?remove=' . urlencode($item['p_id']) . '"><span class="icon_close"></span></a></td>
                                    </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5">Your cart is empty</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="shop.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <button type="submit" name="update_cart" class="btn btn-primary"><span class="icon_loading"></span> Update cart</button>
                    </div>
                </div>
            </div> -->
        </form>

        <!-- <?php
        if (isset($_GET['update_cart'])) {
            if (!empty($_SESSION['cart']) && isset($_GET['qty']) && isset($_GET['p_id'])) {
                foreach ($_GET['p_id'] as $key => $p_id) {
                    $qty = intval($_GET['qty'][$key]);
                    foreach ($_SESSION['cart'] as &$item) {
                        if ($item['p_id'] == $p_id) {
                            $item['qty'] = $qty > 0 ? $qty : 1;
                            break;
                        }
                    }
                    unset($item);
                }
            }
            header('Location: ' . strtok($_SERVER["REQUEST_URI"],'?'));
            exit();
        }
        ?> -->

        <div class="row">
            <div class="col-lg-4 offset-lg-8">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$<?php echo number_format($total, 2); ?></span></li>
                        <li>Total <span>$<?php echo number_format($total, 2); ?></span></li>
                    </ul>
                    <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
