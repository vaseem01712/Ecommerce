<div class="stock-attention-widget">

    <div class="stock-attention-header">
        <div>
            <h2>Stock Attention</h2>

            <p>
                Products that need a restock check.
            </p>
        </div>

        @if($products->count() > 0)
            <div class="stock-warning-icon">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v4m0 4h.01M10.29 3.86 2.82 17a2 2 0 0 0 1.74 3h14.88a2 2 0 0 0 1.74-3L13.71 3.86a2 2 0 0 0-3.42 0Z"
                    />
                </svg>
            </div>
        @endif
    </div>


    @if($products->count() === 0)

        <div class="stock-healthy">
            <div class="stock-success-icon">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m5 12 4 4L19 6"
                    />
                </svg>
            </div>

            <div>
                <strong>
                    All products have healthy stock.
                </strong>

                <span>
                    No immediate restock is required.
                </span>
            </div>
        </div>

    @else

        <div class="stock-products">

            @foreach($products as $product)

                <div class="stock-product">

                    <div class="stock-product-info">
                        <strong>
                            {{ $product->name }}
                        </strong>

                        <span>
                            Current stock
                        </span>
                    </div>


                    @if($product->stock <= 0)

                        <span class="stock-badge stock-danger">
                            Out of stock
                        </span>

                    @elseif($product->stock <= 2)

                        <span class="stock-badge stock-critical">
                            {{ $product->stock }} left
                        </span>

                    @else

                        <span class="stock-badge stock-warning">
                            {{ $product->stock }} left
                        </span>

                    @endif

                </div>

            @endforeach

        </div>

    @endif


    <style>
        .stock-attention-widget {
            width: 100%;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            box-shadow:
                0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .stock-attention-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 22px;
            border-bottom: 1px solid #f0f0f0;
        }

        .stock-attention-header h2 {
            margin: 0;
            font-size: 16px;
            line-height: 24px;
            font-weight: 600;
            color: #111827;
        }

        .stock-attention-header p {
            margin: 4px 0 0;
            font-size: 13px;
            line-height: 20px;
            color: #6b7280;
        }

        .stock-warning-icon {
            width: 36px !important;
            height: 36px !important;
            min-width: 36px !important;
            max-width: 36px !important;
            min-height: 36px !important;
            max-height: 36px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            border-radius: 50%;
            background: #fff7ed;
            color: #ea580c;

            flex-shrink: 0;
        }

        .stock-warning-icon svg {
            width: 20px !important;
            height: 20px !important;
            min-width: 20px !important;
            max-width: 20px !important;
            min-height: 20px !important;
            max-height: 20px !important;

            display: block !important;
        }

        .stock-products {
            width: 100%;
        }

        .stock-product {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 15px 22px;
            border-bottom: 1px solid #f3f4f6;
        }

        .stock-product:last-child {
            border-bottom: none;
        }

        .stock-product-info {
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .stock-product-info strong {
            font-size: 14px;
            line-height: 20px;
            font-weight: 600;
            color: #111827;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .stock-product-info span {
            font-size: 12px;
            line-height: 18px;
            color: #9ca3af;
        }

        .stock-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 4px 9px;

            border-radius: 999px;

            font-size: 11px;
            line-height: 16px;
            font-weight: 600;

            white-space: nowrap;
            flex-shrink: 0;
        }

        .stock-danger {
            background: #fef2f2;
            color: #dc2626;
        }

        .stock-critical {
            background: #fff7ed;
            color: #ea580c;
        }

        .stock-warning {
            background: #fffbeb;
            color: #d97706;
        }

        .stock-healthy {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 22px;
        }

        .stock-success-icon {
            width: 36px !important;
            height: 36px !important;
            min-width: 36px !important;
            max-width: 36px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            border-radius: 50%;
            background: #ecfdf5;
            color: #059669;
        }

        .stock-success-icon svg {
            width: 20px !important;
            height: 20px !important;
            min-width: 20px !important;
            max-width: 20px !important;
            min-height: 20px !important;
            max-height: 20px !important;

            display: block !important;
        }

        .stock-healthy strong {
            display: block;
            font-size: 13px;
            line-height: 20px;
            font-weight: 600;
            color: #065f46;
        }

        .stock-healthy span {
            display: block;
            margin-top: 2px;
            font-size: 12px;
            line-height: 18px;
            color: #059669;
        }
    </style>

</div>
