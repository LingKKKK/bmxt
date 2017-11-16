<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    const DEFAULT_VALIDATOR_ERRER_CODE = 1;

    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 覆盖 ValidatesRequests 中的 validate 方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return void
     *
     * @throws \Illuminate\Http\Exception\HttpResponseException
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $messages = $this->wrapValidateMessages($messages);

        // ValidatesRequestTrais代码
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
    }

    /**
     * Create the response for when a request fails validation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $errors
     * @return \Illuminate\Http\Response
     */
    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        $formattedErrors = $this->unwrapValidateMessages($errors);

        if ($request->ajax() || $request->wantsJson()) {
            list($code, $message) = reset($formattedErrors);
            return api_response($code, $message);
        }

        list($code, $message) = reset($formattedErrors);
        return api_response($code, $message);

        // BUG:: 返回值为 [1， "errorMessage"] 结构的JSON字符串，对展示不友好
        // 处理方法就是忽略它
        // return redirect()->to($this->getRedirectUrl())
        //                 ->withInput($request->input())
        //                 ->withErrors($errors, $this->errorBag());

    }

    protected function unwrapValidateMessages(array $errors)
    {
        $formattedErrors = [];

        foreach ($errors as $rule => $error) {

            // 只取第一个错误结果即可
            $error = reset($error);

            $jsonError = json_decode($error, true);

            if (is_array($jsonError)) {
                list($code, $message) = $jsonError;
            } else {
                $code = self::DEFAULT_VALIDATOR_ERRER_CODE;
                $message = $error ?: '';
            }

            $formattedErrors[$rule] = [$code, $message];
        }

        return $formattedErrors;
    }

    protected function wrapValidateMessages(array $messages)
    {
        $formattedMessages = [];

        foreach ($messages as $rule => $message) {
            $formatted = [];

            if (is_string($message)) {
                $formatted = [self::DEFAULT_VALIDATOR_ERRER_CODE, $message];
            } else if (is_array($message)) {
                if (count($message) > 2) {
                    throw new InvalidArgumentException('error validator message format');
                }

                if (count($message) === 2) {
                    $formatted = [$message[0], $message[1]];
                }

                if (count($message) == 1) {
                    $code = array_keys($message)[0]; //
                    $formatted = [$code, reset($message)];
                }
            } else {
                throw new InvalidArgumentException('error validator message format');
            }

            $formattedMessages[$rule] = json_encode($formatted, JSON_UNESCAPED_UNICODE);
        }
        return $formattedMessages;
    }

    /**
     * 抛出错误返回结果
     * @param  [type] $status  [description]
     * @param  [type] $message [description]
     * @return [type]          [description]
     */
    public function throwErrorResponseException($status, $message, $httpCode = 200)
    {
        throw new HttpResponseException(
            response()->json(compact('status', 'message'), 200, [], JSON_UNESCAPED_UNICODE, $httpCode)->header('Content-Type', 'application/json;charset=UTF-8')
        );
    }
}
