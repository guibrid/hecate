<?php

namespace App\Http\Middleware;

use Closure;
use App\Document;

class DownloadDocumentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $document = Document::with('Order')->where('id',$request->id)->first();

        // Authorize to download if user customer id match with order customer
        if (\Auth::user()->hasAnyRole(['user']) && \Auth::user()->customer_id !== $document->order->customer_id) {
            abort(403, 'Unauthorized action.');
        }
        
        return $next($request);
    }
}
