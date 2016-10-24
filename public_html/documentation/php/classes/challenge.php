<?php
class challenge{
	/**
	 * id for this challenge; this is the primary key
	 * @var int $challengeId
	 **/
	private $challengeId;
	/**
	 * id for the author of the challenge; this is the foreign key
	 * @var int $challengeAuthor
	 **/
	private $challengeAuthor;
	/**
	 * id of the email that made the challenge;
	 * @Var string $challengeEmail
	 **/
	private $challengeEmail;

	/**
	 * challenge constructor.
	 * @param int $newChallengeId
	 * @param string $newChallengeAuthor
	 * @param string $newChallengeEmail
	 * @throws InvalidArgumentException
	 * @throws RangeException
	 * @throws Exception
	 * @throws TypeError
	 */
	public function __construct(int $newChallengeId, string $newChallengeAuthor, string $newChallengeEmail) {
		try {
			$this->setChallengeId($newChallengeId);
			$this->setChallengeAuthor($newChallengeAuthor);
			$this->setChallengeEmail($newChallengeEmail);
		}catch(\InvalidArgumentException $invalidArgument) {
			//rethrow the exeption to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $rangeException){
			//rethrow the exeption to the caller
			throw(new \RangeException($rangeException->getMessage(),0, $rangeException));
		}catch (\TypeError $typeError){
			//rethrow the exeption to the caller
			throw (new\TypeError($typeError->getMessage(),0,$typeError));
		}catch (\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for challenge id
	 **/

	/**
	 * id for the Challenge,this is the primary key..
	 * @return int
	 **/
	public function getChallengeId() {
		return $this->challengeId;
	}
	/**
	 * the id for this challenge; is the primary key..
	 * mutator method for challenge Id
	 * @param int $newChallengeId new value of challenge id
	 * @throws UnexpectedValueException if $newChallengeID is not an integer
	 **/
	public function setChallengeId(int $newChallengeId) {
		//verify the challenge id is valid
		$newChallengeId = filter_var($newChallengeId, FILTER_VALIDATE_INT);
		if($newChallengeId === false){
			throw (new UnexpectedValueException("challenge id is not an integer"));
		}
		//convert and store challenge id
		$this->challengeId = intval($newChallengeId);
	}

	/**
	 * author of the challenge
	 * @return string
	 */
	public function getChallengeAuthor() {
		return $this->challengeAuthor;
	}
	/**
	 * the author of the challenge, is the foriegn key
	 *mutator method for challenge author
	 * @param string $newChallengeAuthor new value of challenge author
	 * @throws UnexpectedValueException if $newChallengeAuthor is not valid
	 **/
	public function setChallengeAuthor(string $newChallengeAuthor) {
		//verify the challenge author is valid
		$newChallengeAuthor = trim($newChallengeAuthor);
		$newChallengeAuthor = filter_var($newChallengeAuthor,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty ($newChallengeAuthor) === true){
			throw (new \InvalidArgumentException('if author of challenge is not a valid string'));
		}
		//convert and store challenge author
		$this->challengeAuthor = $newChallengeAuthor;
	}
	/**
	 *email of user issuing the challenge
	 * @return string
	 */
	public function getChallengeEmail() {
		return $this->challengeEmail;
	}
	/**
	 * email of the author of the challenge, this is a foriegn key
	 * mutator method
	 * @param string $newChallengeEmail new value of email challenge
	 * @throws UnexpectedValueException if $newChallengeEmail is not valid
	 **/
	public function setChallengeEmail($newChallengeEmail) {
		//verify the challenge author is valid
		$newChallengeEmail = trim($newChallengeEmail);
		$newChallengeEmail = filter_var($newChallengeEmail,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty ($newChallengeEmail) === true){
			throw (new \InvalidArgumentException('if author of challenge is not a valid string'));
		}
		//convert and store challenge email
		$this->challengeEmail = $newChallengeEmail;
	}

}
