<?php

namespace App\Models;

/**
	create table if not exists active_sessions (
		session_id varchar(255) primary key not null,
    	user_id int not null,
		session_data text,
    	last_activity int,
		ip_address varchar(255),
    	is_active boolean default 1,
		foreign key (user_id) references users(id) on delete cascade
	);
 */

class ActiveSessions extends Model
{
	public $table = 'active_sessions';

	/**
	 * @param array $data
	 * @return bool
	 */
	public function insert(array $data): bool
	{
		$sql = "INSERT INTO active_sessions (session_id, user_id, session_data, last_activity, ip_address, is_active) VALUES (?,?,?,?,?,?)";
		try {
			$this->prepare(sql: $sql, params: $data);
			return true;
		} catch (\Exception) {
			return false;
		}
	}

	public function updateLastActivity(): bool
	{
		$sql = "UPDATE active_sessions SET last_activity = ? WHERE session_id = ?";
		try {
			$this->prepare(sql: $sql, params: [time(), getSessionId()]);
			return true;
		} catch (\Exception) {
			return false;
		}
	}

	public function deleteBySessionId(): bool
	{
		$sql = "DELETE FROM active_sessions WHERE session_id = ?";
		try {
			$this->prepare(sql: $sql, params: [getSessionId()]);
			return true;
		} catch (\Exception) {
			return false;
		}
	}
}
