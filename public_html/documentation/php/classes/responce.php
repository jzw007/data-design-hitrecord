<?php

class response{
	/**
	 * id for response, this is primary key
	 * @var int $responseId
	 **/
	private $responseId;
	/**
	 * id of the User.php of the response, this is a primary key
	 * @var int $responseUserId
	 **/
	private $responseUserId;
	/**
	 * id of the challenge.php issued, this a foreign key
	 * @var string $responseChallengeId
	 */
	private $responseChallengeId;
	/**
	 * name of the user,
	 * @var string $responseUserName
	 */
	private $responseUserName;
	/**
	 * date and time of response
	 * @var string $responseDateTime
	 */
	private $responseDateTime;

	/**
	 * response constructor.
	 * @param int $newResponseId
	 * @param int $newResponseUserId
	 * @param string $responseChallengeId
	 * @param string $newResponseUserName
	 * @param string $newResponseDateTime
	 * @throws InvalidArgumentException
	 * @throws RangeException
	 * @throws TypeError
	 * @throws Exception
	 */
	public function __construct(int $newResponseId, int $newResponseUserId, string $responseChallengeId, string $newResponseUserName, string $newResponseDateTime) {
		try {
			$this->setResponseId($newResponseId);
			$this->setResponseUserId($newResponseUserId);
			$this->setResponseChallengeId($responseChallengeId);
			$this->setResponseUserName($newResponseUserName);
			$this->setResponseDateTime($newResponseDateTime);
		}catch(\InvalidArgumentException $invalidArgumentException){
			//rethrow the exception to the caller
			throw(new\InvalidArgumentException($invalidArgumentException->getMessage() ,0, $invalidArgumentException));
		}catch(\RangeException $rangeException){
			//rethrow the exception to the caller
			throw(new\RangeException($rangeException->getMessage() , 0, $rangeException));
		}catch(\TypeError $typeError){
			//rethrow the exception to the caller
			throw (new\TypeError($typeError->getMessage(),0,$typeError));
		}catch(\Exception $exception){
			//rethrow the exception to the caller
			throw (new\Exception($exception->getMessage() ,0, $exception));
		}
	}
	/**
	 * id for the response to the challenge.php, primary key
	 * @return int
	 */
	public function getResponseId() {
		return $this->responseId;
	}
	/**
	 * mutator method for response id
	 * @param int $newResponceId new value of response id
	 * @throws \RangeException if $newResponseId is not positive
	 * @throws \TypeError if $newResponseId is not an integer
	 */
	public function setResponseId(int $newResponseId){
		//verify response id is positive
		if ($newResponseId ===0){
			throw (new RangeException('response id is not positive'));
		}
		//convert and store response id
		$this->responseUserId = $newResponseId;
	}
	/**
	 * id of the user for this response, foreign key
	 * @return string
	 */
	public function getResponseUserId() {
		return $this->responseUserId;
	}
	/**
	 * mutator method for responce user id
	 * @param string $newResponceUserId new value of responce user id
	 * @throws \RangeException if $newResponceUserId is not positive
	 * @throws \TypeError if $newResponceUserId is not an string
	 **/
	public function setResponceUserId(string $newResponseUserId){
		//verify responce user id is positive
		$newResponseUserId = trim($newResponseUserId);
		$newResponseUserId = filter_var($newResponseUserId, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newResponseUserId === true)){
			throw (new \InvalidArgumentException('if $newResponseUserId is empty or insecure'));
		}
		//convert and store response user id
		$this->$newResponseUserId;
	}
	/**
	 * accessor method for response challenge.php id
	 *
	 * id of the challenge.php issued, foreign key
	 * @return string
	 **/
	public function getResponseChallengeId() {
		return $this->responseChallengeId;
	}
	/**
	 * mutator method response challenge.php id
	 * @param string $newResponseChallengeId new value of response challenge.php id
	 * @throws \RangeException if $newResponseChallengeId is not positive
	 * @throws \TypeError if $newResponseChallengeId is not a string
	 **/
	public function setResponseChallengeId(string $newResponseChallengeId){
		//verify response user id is positive
		$newResponseChallengeId = trim($newResponseChallengeId);
		$newResponseChallengeId = filter_var($newResponseChallengeId, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newResponseChallengeId === true)){
			throw (new \InvalidArgumentException('if $newResponseChallengeId is empty or insecure'));
		}
		// convert and store response challenge.php id
		$this->$newResponseChallengeId;
	}
	/**
	 * accessor method for response user name
	 *
	 * id of the response user name, foreign key
	 * @return string
	 **/
	public function getResponseUserName() {
		return $this->responseUserName;
	}
	/**
	 * mutator method response user name
	 * @param string $newResponseUserName new value of response user name
	 * @throws \RangeException if $newResponseUserName is not positive
	 * @throws \TypeError if $newResponseUserName is not a string
	 */
	public function setResponseUserName(string $newResponseUserName){
		//verify response user name is positive
		$newResponseUserName = trim($newResponseUserName);
		$newResponseUserName = filter_var($newResponseUserName,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newResponseUserName === true)){
			throw (new \InvalidArgumentException('if $newResponseUserName is empty of insecure'));
		}
		// convert and store responce challenge.php id
		$this->$newResponseUserName;
	}

	/**
	 * accessor method for responce date and time
	 * date and time of the responce sent, in PHP DateTime object
	 * @return \DateTime value of response date
	 */

	public function getResponseDateTime() {
		return $this->responseDateTime;
	}
	/**
	 * mutator method for response date
	 * @param \DateTime|string|null $newResponseDateTime response date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newResponseDateTime is not a valid object or string
	 * @throws \RangeException if $newResponseDateTime is a date that does not exist
	 **/
	public function setResponseDateTime ($newResponseDateTime = null){
		//base case: if date is null, use current date and time
		if($newResponseDateTime === null){
			$this->ResponseDateTime = new\DateTime();
			return;
		}
		//store the response date time
		try {
			$newResponseDateTime = self:: validateDateTime($newResponseDateTime);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		//store response date time
		$this->responseDateTime = $newResponseDateTime;


	}

}

