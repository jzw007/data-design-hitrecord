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
	public function getResponceId() {
		return $this->responseId;
	}
	/**
	 * mutator method for responce id
	 * @param int $newResponceId new value of responce id
	 * @throws \RangeException if $newResponceId is not positive
	 * @throws \TypeError if $newResponceId is not an integer
	 */
	public function setResponceId(int $newResponceId){
		//verify responce id is positive
		if ($newResponceId ===0){
			throw (new RangeException('responce id is not positive'));
		}
		//convert and store responce id
		this->responseUserId = $newResponceId;
	}
	/**
	 * id of the user for this response, foreign key
	 * @return string
	 */
	public function getResponceUserId() {
		return $this->responseUserId;
	}
	/**
	 * mutator method for responce user id
	 * @param string $newResponceUserId new value of responce user id
	 * @throws \RangeException if $newResponceUserId is not positive
	 * @throws \TypeError if $newResponceUserId is not an string
	 **/
	public function setResponceUserId(string $newResponceUserId){
		//verify responce user id is positive
		$newResponceUserId = trim($newResponceUserId);
		$newResponceUserId = filter_var($newResponceUserId, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newResponceUserId === true)){
			throw (new \InvalidArgumentException('if $newResponceUserId is empty or insecure'));
		}
		//convert and store responce user id
		this->$newResponceUserId;
	}
	/**
	 * accessor method for responce challenge.php id
	 *
	 * id of the challenge.php issued, foreign key
	 * @return string
	 **/
	public function getResponceChallengeId() {
		return $this->responseChallengeId;
	}
	/**
	 * mutator method responce challenge.php id
	 * @param string $newResponceChallengeId new value of responce challenge.php id
	 * @throws \RangeException if $newResponceChallengeId is not positive
	 * @throws \TypeError if $newResponceChallengeId is not a string
	 **/
	public function setResponceChallengeId(string $newResponceChallengeId){
		//verify responce user id is positive
		$newResponceChallengeId = trim($newResponceChallengeId);
		$newResponceChallengeId = filter_var($newResponceChallengeId, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newResponceChallengeId === true)){
			throw (new \InvalidArgumentException('if $newResponceChallengeId is empty or insecure'));
		}
		// convert and store responce challenge.php id
		this->$newResponceChallengeId;
	}
	/**
	 * accessor method for responce user name
	 *
	 * id of the responce user name, foreign key
	 * @return string
	 **/
	public function getResponceUserName() {
		return $this->responseUserName;
	}
	/**
	 * mutator method responce user name
	 * @param string $newResponceUserName new value of responce user name
	 * @throws \RangeException if $newResponceUserName is not positive
	 * @throws \TypeError if $newResponceUserName is not a string
	 */
	public function setResponceUserName(string $newResponceUserName){
		//verify responce user name is positive
		$newResponceUserName = trim($newResponceUserName);
		$newResponceUserName = filter_var($newResponceUserName,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newResponceUserName === true)){
			throw (new \InvalidArgumentException('if $newResponceUserName is empty of insecure'));
		}
		// convert and store responce challenge.php id
		this->$newResponceUserName;
	}

	/**
	 * accessor method for responce date and time
	 * date and time of the responce sent, in PHP DateTime object
	 * @return \DateTime value of responce date
	 */
	public function getResponceDateTime() {
		return $this->responseDateTime;
	}
	/**
	 * mutator method for responce date
	 * @param \DateTime|string|null $newResponceDateTime responce date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newResponceDateTime is not a valid object or string
	 * @throws \RangeException if $newResponceDateTime is a date that does not exist
	 **/
	public function setResponceDateTime ($newResponceDateTime = null){
		//base case: if date is null, use current date and time
		if($newResponceDateTime === null){
			this->ResponceDateTime = new\DateTime();
			return;
		}
		//store the responce date time
		try {
			$newResponceDateTime = self::ßvalidateDateTime($newResponceDateTime);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		//store response date time
		$this->responseDateTime = $newResponceDateTime;


	}

}

}