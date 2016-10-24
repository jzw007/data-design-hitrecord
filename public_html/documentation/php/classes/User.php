<?php
class User {
	/**
	 * id of the user, prime key
	 * @var int $userId
	 */
	private $userId;
	/**
	 * email of the user,
	 * @var string $userEmail
	 */
	private $userEmail;
	/**
	 * name of the user
	 * @var string $userName
	 */
	private $userName;

	/**
	 * User constructor.
	 * @param int $newUserId
	 * @param string $newUserEmail
	 * @param string $newUserName
	 * @throws InvalidArgumentException
	 * @throws RangeException
	 * @throws Exception
	 * @throws TypeError
	 **/
	public function __construct(int $newUserId, string $newUserEmail, string $newUserName){
		try {
			$this->setUserId($newUserId);
			$this->setUserEmail($newUserEmail);
			$this->setUserName($newUserName);

		}catch(\InvalidArgumentException $invalidArgument) {
			//rethrow the exeption to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $rangeException){
			//rethrow the exeption to the caller
			throw(new \RangeException($rangeException->getMessage(),0, $rangeException));
		}catch (\TypeError $typeError){
			//rethrow the exeption to the caller
			throw (new\TypeError($typeError->getMessage(),0,$typeError));
		}catch (\Exception $exception){
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(),0,$exception));
		}

	}
	/**
	 * id for the User,this is the primary key..
	 * @return int
	 **/
	public function getUserId() {
		return $this->userId;
	}
	/**
	 * mutator method for user id
	 *
	 * @param int $newUserId new value of user profile id
	 * @throws \RangeException if $newUserId is not positive
	 * @throws \TypeError if $newUserId is not an integer
	 **/
	public function setUserId(int $newUserId) {
		//verify the user id is positive
		if($newUserId <= 0) {
			throw (new \RangeException("user id is not positive"));
		}
		//convert and store the user id
		$this->userId = $newUserId;
	}
	// setUserId...
	/**
	 * email of User
	 * @return string
	 **/
	public function getUserEmail() {
		return $this->userEmail;
	}
	// setUserEmail..
	/**
	 * mutator method for user email
	 * @param string $newEmail new value of email
	 * @throws UnexpectedValueException if $newEmail is not valid
	 **/
	/**
	 * @param string $newUserEmail
	 **/
	public function setUserEmail(string $newUserEmail) {
		// verify the email is valid
		$newUserEmail = trim($newUserEmail);
		$newUserEmail = filter_var($newUserEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newUserEmail) === true) {
			throw( new \InvalidArgumentException("user email is not a valid string"));
		}
		$this->userEmail = $newUserEmail;
	}

	/**
	 * accessor method for the user name
	 *
	 * @return string value of the user name
	 **/
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * mutator method for user name
	 *
	 * @param string $newUserName new value of first name
	 * @throws UnexpectedValueException if $newFirstName is not valid
	 **/
	public function setUserName(string $newUserName) {
		// verify the first name is valid
		$newUserName = trim($newUserName);
		$newUserName = filter_var($newUserName, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserName) === true) {
			throw(new \InvalidArgumentException("user name is not a valid string"));
		}
		// store the first name
		$this->userName = $newUserName;
	}
}
