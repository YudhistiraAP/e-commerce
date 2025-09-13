@php
    $map = [
      'pending' => ['class'=>'bg-yellow-100 text-yellow-800', 'label'=>'Pending'],
      'paid' => ['class'=>'bg-blue-100 text-blue-800','label'=>'Paid'],
      'processing' => ['class'=>'bg-indigo-100 text-indigo-800','label'=>'Processing'],
      'shipped' => ['class'=>'bg-orange-100 text-orange-800','label'=>'Shipped'],
      'completed' => ['class'=>'bg-green-100 text-green-800','label'=>'Completed'],
      'cancelled' => ['class'=>'bg-red-100 text-red-800','label'=>'Cancelled'],
    ];
    $info = $map[$status] ?? ['class'=>'bg-gray-100 text-gray-800','label'=>ucfirst($status)];
@endphp

<span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $info['class'] }}">
    {{ $info['label'] }}
</span>