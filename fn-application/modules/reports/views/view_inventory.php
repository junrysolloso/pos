<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>fn-uploads/dinagat-coders-icon.png" />
  <title><?php echo $title; ?></title>
  <style>
    table {
      width: 100% !important;
    }

    tbody td, tfoot td {
      border-bottom: 1px solid #eee;
      text-align: left;
    }

    table th {
      border-bottom: 1px solid #eee;
      padding: 15px 0px;
      text-align: left;
      text-transform: uppercase;
    }

    tfoot td {
      font-weight: 800;
      padding: 15px 0px;
    }

    h1 {
      text-transform: uppercase;
    }

    .text-center {
      text-align: center;
    }

    .text-left {
      text-align: left;
    }
    
    .text-right {
      text-align: right;
    }

    small {
      display: block;
      font-size: 12px;
      padding-bottom: 2px;
    }

    td {
      padding: 11px 0px;
    }
  </style>
</head>
<body>
  <div class="table-responsive">
    <h1>INVENTORY</h1>
    <p><?php echo strtoupper( $title ); ?></p>
    <p><?php echo strtoupper( $subtitle ); ?></p><br />
    <table class="table shadow-sm ctm-table bg-white data-table">
      <thead>
        <tr>
          <th>PRODUCT NAME</th>
          <th>EXPIRY</th>
          <th>PPU</th>
          <th>SRP</th>
          <th>STOCKS</th>
          <th>AMOUNT</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0; foreach( $inventory as $row ): ?>
          <tr>
            <td><?php echo ucfirst( $row->name ); ?></td>
            <td><?php echo $row->expiry_date; ?></td>
            <td><?php echo $row->price_per_unit; ?></td>
            <td><?php echo $row->srp; ?></td>
            <td><?php echo ucwords( $row->remaining .' '. $row->unit_desc ); ?></td>
            <td><?php echo number_format( floatval( $row->price_per_unit ) * intval( $row->remaining ), 2 ); ?></td>
          </tr>
        <?php $total += floatval( $row->price_per_unit ) * intval( $row->remaining ); endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">TOTAL</td>
          <td><?php echo number_format( $total, 2 ); ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
  <p style="letter-spacing: 1px; padding-top: 20px;"><?php credits( 'co' ); ?></p>
</body>
</html>
